<?php

declare(strict_types=1);

namespace UserService\Domain\Collection;

use UserService\Domain\Entity\User;
use UserService\Domain\Collection\Base\GenericCollection;


/**
 * @method User current()
 */
final  class UserCollection extends GenericCollection
{
    public function __construct(
        iterable $elements,
    ) {
        parent::__construct(User::class, $elements);
    }
}