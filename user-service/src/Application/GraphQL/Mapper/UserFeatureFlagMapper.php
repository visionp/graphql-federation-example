<?php

declare(strict_types=1);

namespace UserService\Application\GraphQL\Mapper;

use UserService\Application\GraphQL\Model\UserFeatureFlagType;
use UserService\Domain\Entity\UserFeatureFlag;

final readonly class UserFeatureFlagMapper
{
    public static function map(?UserFeatureFlag $userFeatureFlag): ?UserFeatureFlagType
    {
        error_log('UserFeatureFlagMapper::map');
        if ($userFeatureFlag === null) {
            return null;
        }

        $type = new UserFeatureFlagType();
        $type->id = $userFeatureFlag->id;
        $type->name = $userFeatureFlag->name;

        return $type;
    }
}