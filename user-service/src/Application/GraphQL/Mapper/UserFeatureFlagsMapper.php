<?php

declare(strict_types=1);

namespace UserService\Application\GraphQL\Mapper;

use UserService\Domain\Collection\UserFeatureFlagCollection;

final readonly class UserFeatureFlagsMapper
{
    public static function map(UserFeatureFlagCollection $userFeatureFlags): \Generator
    {
        foreach ($userFeatureFlags as $flag) {
            yield UserFeatureFlagMapper::map($flag);
        }
    }
}