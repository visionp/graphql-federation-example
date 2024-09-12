<?php

namespace UserService\Application\GraphQL\Exception;

use GraphQL\Error\ClientAware;
use RuntimeException;
use Throwable;

class UnauthorizedException extends RuntimeException implements ClientAware
{
    public function __construct(Throwable $previous = null)
    {
        parent::__construct('unauthorized', 403, $previous);
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