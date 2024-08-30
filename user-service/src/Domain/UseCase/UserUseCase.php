<?php

declare(strict_types=1);

namespace UserService\Domain\UseCase;

final readonly class UserUseCase
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
    ) {
    }
}