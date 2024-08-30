<?php

declare(strict_types=1);

namespace UserService\Infrastructure\Repository;

use UserService\Domain\Entity\User;
use UserService\Domain\Repository\UserRepositoryInterface;
use UserService\Domain\Collection\UserCollection;

final readonly class UserRepository implements UserRepositoryInterface
{
    private array $users;

    public function __construct()
    {
        $this->users = $this->initUsers();
    }

    public function findAll(): UserCollection
    {
        return new UserCollection($this->users);
    }

    public function findById(string $id): ?User
    {
        return $this->users[$id] ?? null;
    }

    private function initUsers(): array
    {
        $users = [];
        $names = [
            'John',
            'Kate',
            'Mike',
            'Jane',
            'Doe',
            'Smith',
            'Brown',
            'Wilson',
            'Taylor',
            'Lee',
        ];
        for ($i = 0; $i < 10; $i++) {
            $name = $names[$i];
            $id = (string)++$i;
            $users[$id] = new User($id, $name, sprintf("%s@test.com", $name));
        }

        return $users;
    }
}