<?php

namespace UserService\Domain\Repository;

use UserService\Domain\Collection\UserFeatureFlagCollection;
use UserService\Domain\Entity\UserFeatureFlag;

interface UserFeatureFlagRepositoryInterface
{
    public function findById(string $id): ?UserFeatureFlag;
    public function findByUserId(string $idUser): UserFeatureFlagCollection;
}