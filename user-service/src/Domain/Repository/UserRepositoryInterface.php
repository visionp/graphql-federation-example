<?php

namespace UserService\Domain\Repository;

use UserService\Domain\Collection\UserCollection;
use UserService\Domain\Entity\User;

interface UserRepositoryInterface
{
    public function findAll(?int $limit = null): UserCollection;
    public function findById(string $id): ?User;
    public function findByIds(string ...$ids): UserCollection;
}