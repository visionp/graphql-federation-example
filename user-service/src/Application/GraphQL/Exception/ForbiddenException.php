<?php

namespace UserService\Application\GraphQL\Exception;

use GraphQL\Error\ClientAware;
use RuntimeException;
use Throwable;

class ForbiddenException extends RuntimeException implements ClientAware
{
    public function __construct(Throwable $previous = null)
    {
        parent::__construct('forbidden', 403, $previous);
    }

    public function isClientSafe(): bool
    {
        return true;
    }

    public function getCategory()
    {
        return 'access';
    }
}