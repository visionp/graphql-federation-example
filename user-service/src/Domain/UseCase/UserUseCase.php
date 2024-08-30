<?php

declare(strict_types=1);

namespace GraphqlApp\Domain\UseCase;

final readonly class UserUseCase
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
    ) {
    }
}