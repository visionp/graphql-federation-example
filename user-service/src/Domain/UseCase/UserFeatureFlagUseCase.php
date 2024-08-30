<?php

declare(strict_types=1);

namespace UserService\Domain\UseCase;

use UserService\Domain\Repository\UserFeatureFlagRepositoryInterface;

final readonly class UserFeatureFlagUseCase
{
    public function __construct(
        private UserFeatureFlagRepositoryInterface $userFeatureFlagRepository
    ) {
    }
}