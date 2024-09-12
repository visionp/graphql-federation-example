<?php

declare(strict_types=1);

namespace UserService\Domain\Entity;

final readonly class Identity
{
    /**
     * @param string[] $roles
     */
    public function __construct(
        public ?int $id,
        public string $name,
        array $roles,
    ) {
    }
}