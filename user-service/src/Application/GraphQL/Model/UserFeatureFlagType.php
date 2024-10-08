<?php

declare (strict_types=1);
namespace UserService\Application\GraphQL\Model;

use Axtiva\FlexibleGraphql\Resolver\AutoGenerationInterface;

/**
 * This code is @generated by axtiva/flexible-graphql-php
 * if you want to extend it or change, then remove interface AutoGenerationInterface
 * and it will be managed by you, not axtiva/flexible-graphql-php code generator
 * PHP representation of graphql type UserFeatureFlag
 */
final class UserFeatureFlagType implements _EntityInterface
{
    public string $id;
    public string $name;
}