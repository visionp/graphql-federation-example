<?php

declare(strict_types=1);

namespace GraphqlApp\Domain\UseCase;

use GraphqlApp\Domain\Repository\UserRepositoryInterface;

final readonly class ProfileUseCase
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
    ) {
    }
}