<?php

declare(strict_types=1);

namespace UserService\Application\GraphQL;

use UserService\Domain\Entity\Identity;

final readonly class Context
{
    public function __construct(
        public ?Identity $identity,
    ) {
    }
}