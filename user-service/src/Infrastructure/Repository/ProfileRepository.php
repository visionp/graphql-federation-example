<?php

declare(strict_types=1);

namespace UserService\Infrastructure\Repository;

use UserService\Domain\Collection\ProfileCollection;
use UserService\Domain\Entity\Profile;
use UserService\Domain\Repository\ProfileRepositoryInterface;

final readonly class ProfileRepository implements ProfileRepositoryInterface
{
    private array $profiles;
    private array $profilesByIdUser;

    public function __construct()
    {
        $this->profiles = $this->initProfiles();
        $profilesByIdUser = [];
        foreach ($this->profiles as $profile) {
            $profilesByIdUser[$profile->idUser] = $profile;
        }
        $this->profilesByIdUser = $profilesByIdUser;
    }

    public function findById(string $id): ?Profile
    {
        return $this->profiles[$id] ?? null;
    }

    public function findByUserId(string $idUser): ?Profile
    {
        return $this->profilesByIdUser[$idUser] ?? null;
    }

    public function findAll(): ProfileCollection
    {
        return new ProfileCollection($this->profiles);
    }

    private function initProfiles(): array
    {
        $profiles = [];

        for ($i = 1; $i < 11; $i++) {
            $profiles[$i] = new Profile(
                (string) $i,
                (string) $i,
                rand(1, 5),
            );
        }

        return $profiles;
    }
}