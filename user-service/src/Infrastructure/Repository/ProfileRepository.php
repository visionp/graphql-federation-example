<?php

declare(strict_types=1);

namespace UserService\Infrastructure\Repository;

use UserService\Domain\Collection\ProfileCollection;
use UserService\Domain\Entity\Profile;
use UserService\Domain\Repository\ProfileRepositoryInterface;

final readonly class ProfileRepository implements ProfileRepositoryInterface
{
    private array $profiles;
    private array $profilesBuIdUser;

    public function __construct()
    {
        $this->profiles = $this->initProfiles();
        foreach ($this->profiles as $profile) {
            $this->profilesBuIdUser[$profile->idUser] = $profile;
        }
    }

    public function findById(string $id): ?Profile
    {
        return $this->profiles[$id] ?? null;
    }

    public function findByUserId(string $idUser): ?Profile
    {
        return $this->profilesBuIdUser[$idUser] ?? null;
    }

    public function findAll(): ProfileCollection
    {
        return new ProfileCollection($this->profiles);
    }

    private function initProfiles(): array
    {
        $profiles = [];

        for ($i = 0; $i < 10; $i++) {
            $idUser = ++$i;
            $id = $idUser * 7;
            $profiles[$id] = new Profile(
                (string) $id,
                (string) $idUser,
                rand(1, 5),
            );
        }

        return $profiles;
    }
}