<?php

declare(strict_types=1);

namespace UserService\Infrastructure\Repository;

use UserService\Domain\Collection\UserFeatureFlagCollection;
use UserService\Domain\Repository\UserFeatureFlagRepositoryInterface;
use UserService\Domain\Entity\UserFeatureFlag;

final readonly class UserFeatureFlagRepository implements UserFeatureFlagRepositoryInterface
{
    private array $flags;
    private array $userFlagRelation;

    public function __construct()
    {
        $this->flags = $this->init();
        $this->userFlagRelation = [
            '1' => ['1', '2'],
            '2' => ['1', '2', '4'],
            '3' => ['1', '2', '4'],
            '4' => ['1', '2', '4'],
            '5' => ['2', '4', '5'],
        ];
    }

    public function findById(string $id): ?UserFeatureFlag
    {
        return $this->flags[$id] ?? null;
    }

    public function findByUserId(string $idUser): UserFeatureFlagCollection
    {
        $flags = $this->userFlagRelation[$idUser] ?? [];

        foreach ($flags as $flagId) {
            $flags[] = $this->findById($flagId);
        }

        return new UserFeatureFlagCollection(array_filter($flags));
    }

    private function init(): array
    {
        return [
            new UserFeatureFlag('1', 'red'),
            new UserFeatureFlag('2', 'blue'),
            new UserFeatureFlag('3', 'yellow'),
            new UserFeatureFlag('4', 'white'),
        ];
    }
}