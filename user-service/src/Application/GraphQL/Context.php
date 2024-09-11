<?php

declare(strict_types=1);

namespace GraphqlApp\Application\GraphQL;

use GraphqlApp\Domain\Entity\Identity;

final readonly class Context
{
    public function __construct(
        public ?Identity $identity,
    ) {
    }
}