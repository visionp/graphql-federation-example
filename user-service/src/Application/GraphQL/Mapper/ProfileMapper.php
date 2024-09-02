<?php

declare(strict_types=1);

namespace UserService\Application\GraphQL\Mapper;

use UserService\Application\GraphQL\Model\ProfileType;
use UserService\Domain\Entity\Profile;

final readonly class ProfileMapper
{
    public static function map(?Profile $profile): ?ProfileType
    {
        if ($profile === null) {
            return null;
        }

        $profileType = new ProfileType();
        $profileType->id = $profile->id;
        $profileType->rating = $profile->rating;

        return $profileType;
    }
}