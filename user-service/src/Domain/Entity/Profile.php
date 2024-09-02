<?php

declare(strict_types=1);

namespace UserService\Domain\Entity;

final readonly class Profile
{
    public function __construct(
        public string $id,
        public string $idUser,
        public int $rating,
    ) {
    }
}