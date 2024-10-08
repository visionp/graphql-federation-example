<?php

declare (strict_types=1);
namespace UserService\Application\GraphQL\Model;

use Axtiva\FlexibleGraphql\Generator\Exception\UnknownEnumValue;
use Axtiva\FlexibleGraphql\Type\EnumInterface;

/**
 * This code is @generated by axtiva/flexible-graphql-php
 * and will be regenerated. Do not edit it manually
 * PHP representation of graphql enum UserGender
 */
final class UserGenderEnum implements EnumInterface
{
    public const MALE = 'MALE';
    public const FEMALE = 'FEMALE';
    public string $value;
    private static array $map = [
        self::MALE => true,
        self::FEMALE => true,
    ];

    public function __construct($value)
    {
        if (!isset(self::$map[$value])) {
            throw new UnknownEnumValue(__CLASS__, $value);
        }
        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}