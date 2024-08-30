<?php

declare(strict_types=1);

namespace GraphqlApp\Application\GraphQL\Mapper;

use UserService\Application\GraphQL\Model\ProfileType;
use UserService\Domain\Entity\Profile;

final readonly class ProfileMapper
{
    public static function map(?Profile $profile): ?ProfileType
    {
        if ($profile === null) {
            return null;
        }

        return new ProfileType(
            id: $profile->id,
            rating: $profile->rating,
        );
    }
}