<?php

declare(strict_types=1);

namespace UserService\Application\GraphQL\Mapper;

use UserService\Application\GraphQL\Model\UserType;

final readonly class UserMapper
{
    public static function map(?array $user): ?UserType
    {
        if ($user === null) {
            return null;
        }

        return new UserType(
            id: $user['id'],
            name: $user['name'],
            email: $user['email'],
        );
    }
}