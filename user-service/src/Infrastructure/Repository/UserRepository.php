<?php

declare(strict_types=1);

namespace UserService\Infrastructure\Repository;

use GraphqlApp\Domain\Enum\UserGender;
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

    public function findAll(?int $limit = null): UserCollection
    {
        if ($limit) {
            return new UserCollection(array_slice($this->users, 0, $limit));
        }
        return new UserCollection($this->users);
    }

    public function findById(string $id): ?User
    {
        return $this->users[$id] ?? null;
    }

    public function findByIds(string ...$ids): UserCollection
    {
       $users = [];
       foreach ($ids as $userId) {
           $user = $this->findById($userId);
           if ($user) {
               $users[] = $user;
           }
       }

       return new UserCollection($users);
    }

    private function initUsers(): array
    {
        $users = [];
        $names = [
            'John' => [
                'gender' => UserGender::MALE,
            ],
            'Kate' => [
                'gender' => UserGender::FEMALE,
            ],
            'Mike' => [
                'gender' => UserGender::MALE,
            ],
            'Jane' => [
                'gender' => UserGender::FEMALE,
            ],
            'Doe' => [
                'gender' => UserGender::MALE,
            ],
            'Smith' => [
                'gender' => UserGender::MALE,
            ],
            'Brown' => [
                'gender' => UserGender::MALE,
            ],
            'Wilson' => [
                'gender' => UserGender::MALE,
            ],
            'Taylor' => [
                'gender' => UserGender::FEMALE,
            ],
            'Lee' => [
                'gender' => UserGender::MALE,
            ],
        ];

        $i = 0;
        foreach ($names as $name => $data) {
            $id = (string)++$i;
            $users[$id] = new User($id, $name, sprintf("%s@test.com", $name), $data['gender']);
        }

        return $users;
    }
}