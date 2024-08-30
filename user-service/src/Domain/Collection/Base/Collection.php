<?php

declare(strict_types=1);

namespace UserService\Domain\Collection\Base;

class Collection implements \Iterator, \Countable, CollectionInterface, \JsonSerializable
{
    private ?\Iterator $inner = null;
    private array $cache = [];
    private int $offset = 0;

    public function __construct(iterable $elements)
    {
        if (\is_array($elements)) {
            $iterator = new \ArrayIterator($elements);
        } elseif ($elements instanceof \Iterator) {
            $iterator = $elements;
        } else {
            $err = 'Invalid format of collection elements it should be instance of Iterator or array';
            throw new CollectionException($err);
        }

        $this->inner = $iterator;

        if ($this->inner->valid()) {
            $this->cache[] = [$iterator->key(), $iterator->current()];
        }
    }

    public function rewind(): void
    {
        $this->offset = 0;
    }

    public function valid(): bool
    {
        return isset($this->cache[$this->offset]) || array_key_exists($this->offset, $this->cache);
    }

    public function key(): mixed
    {
        return $this->cache[$this->offset][0] ?? null;
    }

    public function current(): mixed
    {
        return $this->cache[$this->offset][1] ?? null;
    }

    public function next(): void
    {
        if (!isset($this->cache[$this->offset])) { // end already reached, do nothing
            return;
        }

        $nextPairOffset = $this->offset + 1;

        if (!isset($this->cache[$nextPairOffset]) && $this->inner !== null) {
            $this->inner->next();

            if ($this->inner->valid()) {
                $this->cache[] = [$this->inner->key(), $this->inner->current()];
            } else {
                $this->inner = null;
            }
        }

        $this->offset = $nextPairOffset;
    }

    public function count(): int
    {
        if ($this->inner !== null) {
            // the end has not been reached yet

            // use count() if available
            if ($this->inner instanceof \Countable) {
                return $this->inner->count();
            }

            // iterate the remaining pairs to determine full count
            $currentOffset = $this->offset;

            try {
                while ($this->valid()) {
                    $this->next();
                }
            } finally {
                // always restore original offset
                $this->offset = $currentOffset;
            }
        }

        return count($this->cache);
    }

    public function jsonSerialize(): mixed
    {
        $data = [];

        $this->rewind();
        foreach ($this as $item) {
            $data[] = $item;
        }

        return $data;
    }
}