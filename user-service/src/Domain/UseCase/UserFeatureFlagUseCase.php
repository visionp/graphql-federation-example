<?php

declare(strict_types=1);

namespace GraphqlApp\Domain\UseCase;

use GraphqlApp\Domain\Repository\UserFeatureFlagRepositoryInterface;

final readonly class UserFeatureFlagUseCase
{
    public function __construct(
        private UserFeatureFlagRepositoryInterface $userFeatureFlagRepository
    ) {
    }
}