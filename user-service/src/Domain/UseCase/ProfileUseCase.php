<?php

declare(strict_types=1);

namespace UserService\Domain\UseCase;

use UserService\Domain\Repository\UserRepositoryInterface;

final readonly class ProfileUseCase
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
    ) {
    }
}