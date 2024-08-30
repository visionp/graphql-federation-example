<?php

namespace UserService\Domain\Repository;

use UserService\Domain\Collection\UserCollection;
use UserService\Domain\Entity\User;

interface UserRepositoryInterface
{
    public function findAll(): UserCollection;
    public function findById(string $id): ?User;
}