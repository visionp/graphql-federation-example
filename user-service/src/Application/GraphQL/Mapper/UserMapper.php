<?php

declare(strict_types=1);

namespace UserService\Application\GraphQL\Mapper;

use UserService\Application\GraphQL\Model\UserType;
use UserService\Domain\Entity\User;

final readonly class UserMapper
{
    public static function map(?User $user): ?UserType
    {
        if ($user === null) {
            return null;
        }

        $userType = new UserType();
        $userType->id = $user->id;
        $userType->name = $user->name;
        $userType->email = $user->email;

        return $userType;
    }
}