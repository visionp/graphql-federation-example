<?php

declare(strict_types=1);

namespace UserService\Domain\Entity;

final readonly class User
{
    public function __construct(
        public string $id,
        public string $name,
        public string $email,
    ) {
    }
}