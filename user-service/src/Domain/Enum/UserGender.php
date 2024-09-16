<?php

declare(strict_types=1);

namespace GraphqlApp\Domain\Enum;

enum UserGender: string
{
    case MALE = 'male';
    case FEMALE = 'female';
}