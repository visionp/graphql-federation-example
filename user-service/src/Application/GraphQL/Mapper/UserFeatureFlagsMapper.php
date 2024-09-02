<?php

declare(strict_types=1);

namespace GraphqlApp\Application\GraphQL\Mapper;

use UserService\Application\GraphQL\Model\UserFeatureFlagType;
use UserService\Domain\Collection\UserFeatureFlagCollection;
use UserService\Domain\Entity\UserFeatureFlag;

final readonly class UserFeatureFlagsMapper
{
    public static function map(UserFeatureFlagCollection $userFeatureFlags): \Generator
    {
        foreach ($userFeatureFlags as $flag) {
            yield UserFeatureFlagMapper::map($flag);
        }
    }
}