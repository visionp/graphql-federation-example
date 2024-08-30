<?php

declare(strict_types=1);

namespace GraphqlApp\Domain\Collection;

use UserService\Domain\Collection\Base\GenericCollection;
use UserService\Domain\Entity\Profile;

final class ProfileCollection extends GenericCollection
{
    public function __construct(
        iterable $elements
    ) {
        parent::__construct(Profile::class, $elements);
    }
}