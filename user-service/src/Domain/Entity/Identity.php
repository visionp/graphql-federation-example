<?php

declare(strict_types=1);

namespace GraphqlApp\Domain\Entity;

final readonly class Identity
{
    public function __construct(
        public ?int $id,
        public string $name,
    ) {
    }
}