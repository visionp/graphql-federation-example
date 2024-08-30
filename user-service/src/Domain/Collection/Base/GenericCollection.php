<?php

declare(strict_types=1);

namespace UserService\Domain\Collection\Base;

abstract class GenericCollection extends Collection
{
    private string $typeName;

    /**
     * @throws CollectionException
     */
    protected function __construct(string $typeName, iterable $elements)
    {
        $this->typeName = $typeName;
        parent::__construct($elements);
    }

    public function current(): mixed
    {
        $current = parent::current();
        $this->validate($current);

        return $current;
    }

    private function validate($element): void
    {
        if (false === ($element instanceof $this->typeName)) {
            $err = "Collection element with type {$this->typeName} had " . get_class($element);
            throw new \InvalidArgumentException($err);
        }
    }
}