<?php

declare(strict_types=1);

namespace GraphqlApp\Application\GraphQL\Mapper;

use UserService\Application\GraphQL\Model\UserType;
use UserService\Domain\Collection\UserCollection;

final readonly class UsersMapper
{
    public static function map(UserCollection $users): \Generator
    {
        foreach ($users as $user) {
            yield UserMapper::map($user);
        }
    }
}