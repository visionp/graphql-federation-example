<?php

declare(strict_types=1);

namespace UserService\Application\GraphQL\Scalar;

use Axtiva\FlexibleGraphql\Resolver\TypedCustomScalarResolverInterface;
use GraphQL\Language\AST\Node;
use \DateTimeInterface;
use \DateTimeImmutable;

class DateTimeScalar implements TypedCustomScalarResolverInterface
{
    public static function getTypeName(): ?string
    {
        return DateTimeImmutable::class;
    }

    /**
     * @param DateTimeInterface|null $value
     * @return string|null
     */
    public function serialize($value)
    {
        return $value?->format(DateTimeInterface::RFC3339);
    }

    /**
     * @param mixed $value
     *
     * @return DateTimeImmutable|null
     */
    public function parseValue($value)
    {
        return $value !== null ? new DateTimeImmutable($value) : null;
    }

    /**
     * @param mixed[]|null $variables
     *
     * @return DateTimeImmutable
     *
     * @throws \Exception
     */
    public function parseLiteral(Node $value, ?array $variables = null)
    {
        return isset($value->value) ? new DateTimeImmutable($value->value) : null;
    }
}