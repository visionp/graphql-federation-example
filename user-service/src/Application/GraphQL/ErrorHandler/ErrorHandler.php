<?php

declare(strict_types=1);

namespace UserService\Application\GraphQL\ErrorHandler;

use GraphQL\Error\Error;
use GraphQL\Error\FormattedError;
use Psr\Log\LoggerInterface;

final readonly class ErrorHandler
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(array $errors, callable $formatter)
    {
        return $this->handleErrors($errors, $formatter);
    }

    protected function canHandleError(Error $error): bool
    {
        return true;
    }

    protected function handleErrors(array $errors, callable $formatter)
    {
        foreach ($errors as $error) {
            $this->handleError($error);
        }

        return array_map($formatter, $errors);
    }

    protected function handleError(Error $error)
    {
        if (!$this->canHandleError($error)) {
            return;
        }

        $context = [
            'message' => $error->getMessage(),
            'locations' => $error->getLocations(),
            'path' => $error->getPath(),
        ];

        $prevError = $error->getPrevious() ?? $error;
        $context['file'] = $prevError->getFile();
        $context['line'] = $prevError->getLine();
        $context['trace'] = FormattedError::toSafeTrace($prevError);

        if ($prevError instanceof \Throwable) {
            $context['exception'] = $prevError;
        }

        if (!empty($error->getPath())) {
            $path = implode('.', array_filter($error->getPath(), 'is_string'));
            $context['transaction_name'] = $path;
        }

        $this->logger->error('GraphQL ' . $error->getMessage(), $context);
    }
}