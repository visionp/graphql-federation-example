<?php

declare(strict_types=1);

namespace UserService\Application\GraphQL\Buffer;

use Symfony\Contracts\Service\ResetInterface;
use UserService\Domain\Entity\User;
use UserService\Domain\UseCase\UserUseCase;

final class UserBuffer implements ResetInterface
{
    private bool $isLoaded = false;
    private array $result = [];
    private array $ids = [];

    public function __construct(
        private readonly UserUseCase $userUseCase,
    ) {}

    public function add(string $idUser)
    {
        if ($this->isLoaded) {
            throw new \Exception('You can\'t add new id after loading buffer');
        }

        $this->ids[$idUser] = $idUser;
    }

    public function get(string $id): ?User
    {
        $this->loadBuffered();

        return $this->result[$id] ?? null;
    }

    public function reset()
    {
        $this->isLoaded = false;
        $this->result = [];
        $this->ids = [];
    }

    private function loadBuffered()
    {
        if ($this->isLoaded) {
            return;
        }

        foreach ($this->userUseCase->findByIds(...$this->ids) as $user) {
            $this->result[$user->id] = $user;
        }

        $this->isLoaded = true;
    }
}