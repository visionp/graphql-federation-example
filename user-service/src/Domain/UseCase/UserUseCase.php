<?php

declare(strict_types=1);

namespace UserService\Domain\UseCase;

use UserService\Domain\Collection\UserCollection;
use UserService\Domain\Entity\User;
use UserService\Domain\Repository\UserRepositoryInterface;

final readonly class UserUseCase
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
    ) {
    }

    public function findById(string $id): ?User
    {
        return $this->userRepository->findById($id);
    }

    public function findByIds(string ...$id): UserCollection
    {
        return $this->userRepository->findByIds(...$id);
    }

    public function getAllUsers(): UserCollection
    {
        return $this->userRepository->findAll();
    }
}