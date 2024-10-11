<?php

declare(strict_types=1);

namespace UserService\Domain\Enum;

enum UserGender: string
{
    case MALE = 'male';
    case FEMALE = 'female';
}