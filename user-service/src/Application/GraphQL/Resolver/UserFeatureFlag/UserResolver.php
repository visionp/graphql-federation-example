<?php

declare (strict_types=1);
namespace UserService\Application\GraphQL\Resolver\UserFeatureFlag;

use Axtiva\FlexibleGraphql\Generator\Exception\NotImplementedResolver;
use GraphQL\Type\Definition\ResolveInfo;
use Axtiva\FlexibleGraphql\Resolver\ResolverInterface;
use UserService\Application\GraphQL\Model\UserFeatureFlagType;
use UserService\Application\GraphQL\Model\UserType;

/**
 * This code is @generated by axtiva/flexible-graphql-php
 * This is resolver for UserFeatureFlag.user
 */
final class UserResolver implements ResolverInterface
{
    /**
     * @param UserFeatureFlagType $rootValue
     * @param $args
     * @param $context
     * @param ResolveInfo $info
     * @return UserType
     */
    public function __invoke($rootValue, $args, $context, ResolveInfo $info)
    {
        throw new NotImplementedResolver('Not implemented field resolver ' . __CLASS__);
    }
}