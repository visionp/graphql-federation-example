<?php

declare (strict_types=1);
namespace UserService\Application\GraphQL\Resolver\Query;

use GraphQL\Type\Definition\ResolveInfo;
use Axtiva\FlexibleGraphql\Resolver\ResolverInterface;
use UserService\Application\GraphQL\Context;
use UserService\Application\GraphQL\Mapper\UsersMapper;
use UserService\Application\GraphQL\Model\UserType;
use UserService\Application\GraphQL\ResolverArgs\Query\GetUsersResolverArgs;
use UserService\Domain\UseCase\UserUseCase;

/**
 * This code is @generated by axtiva/flexible-graphql-php
 * This is resolver for Query.getUsers
 */
final readonly class GetUsersResolver implements ResolverInterface
{
    public function __construct(
        private UserUseCase $useCase
    )
    {
    }

    /**
     * @param $rootValue
     * @param GetUsersResolverArgs $args
     * @param Context $context
     * @param ResolveInfo $info
     * @return UserType[]|\Generator
     */
    public function __invoke($rootValue, $args, $context, ResolveInfo $info): \Generator
    {
        return UsersMapper::map(
            $this->useCase->getAllUsers($args->limit)
        );
    }
}