<?php

declare(strict_types=1);

namespace UserService\Domain\UseCase;

use UserService\Domain\Entity\Profile;
use UserService\Domain\Repository\ProfileRepositoryInterface;

final readonly class ProfileUseCase
{
    public function __construct(
        private ProfileRepositoryInterface $profileRepository,
    )
    {
    }

    public function findById(string $id): ?Profile
    {
        return $this->profileRepository->findById($id);
    }

    public function findByUserId(string $idUser): ?Profile
    {
        return $this->profileRepository->findByUserId($idUser);
    }
}