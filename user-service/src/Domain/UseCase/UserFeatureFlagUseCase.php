<?php

declare(strict_types=1);

namespace UserService\Domain\UseCase;

use UserService\Domain\Repository\UserFeatureFlagRepositoryInterface;
use UserService\Domain\Entity\UserFeatureFlag;
use UserService\Domain\Collection\UserFeatureFlagCollection;

final readonly class UserFeatureFlagUseCase
{
    public function __construct(
        private UserFeatureFlagRepositoryInterface $userFeatureFlagRepository,
    )
    {
    }

    public function findById(string $id): ?UserFeatureFlag
    {
        return $this->userFeatureFlagRepository->findById($id);
    }

    public function findByUserId(string $idUser): UserFeatureFlagCollection
    {
        return $this->userFeatureFlagRepository->findByUserId($idUser);
    }
}