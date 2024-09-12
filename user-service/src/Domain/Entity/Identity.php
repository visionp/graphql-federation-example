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
        public array $roles,
    ) {
    }

    public function hasRole(string $role): bool
    {
        return in_array($role, $this->roles, true);
    }
}