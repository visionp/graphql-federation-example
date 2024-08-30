<?php

declare(strict_types=1);

namespace GraphqlApp\Domain\Collection;

use UserService\Domain\Collection\Base\GenericCollection;
use UserService\Domain\Entity\UserFeatureFlag;

final class UserFeatureFlagCollection extends GenericCollection
{
    public function __construct(
        iterable $elements,
    ) {
        parent::__construct(UserFeatureFlag::class, $elements);
    }
}