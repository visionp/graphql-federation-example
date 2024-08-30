<?php

declare(strict_types=1);

namespace GraphqlApp\Application\GraphQL\Mapper;

use UserService\Application\GraphQL\Model\UserFeatureFlagType;
use UserService\Domain\Entity\UserFeatureFlag;

final readonly class UserFeatureFlagMapper
{
    public static function map(?UserFeatureFlag $userFeatureFlag): ?UserFeatureFlagType
    {
        if ($userFeatureFlag === null) {
            return null;
        }

        return new UserFeatureFlagType(
            id: $userFeatureFlag->id,
            name: $userFeatureFlag->name,
        );
    }
}