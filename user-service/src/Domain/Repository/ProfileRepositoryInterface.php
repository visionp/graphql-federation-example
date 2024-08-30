<?php

namespace UserService\Domain\Repository;

use GraphqlApp\Domain\Collection\ProfileCollection;
use UserService\Domain\Entity\Profile;

interface ProfileRepositoryInterface
{
    public function findById(string $id): ?Profile;
    public function findByUserId(string $idUser): ?Profile;
    public function findAll(): ProfileCollection;
}