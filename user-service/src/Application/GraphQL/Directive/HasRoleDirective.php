<?php

declare(strict_types=1);

namespace UserService\Application\GraphQL\Directive;

use Axtiva\FlexibleGraphql\Resolver\DirectiveResolverInterface;
use GraphQL\Type\Definition\ResolveInfo;
use UserService\Application\GraphQL\Context;
use UserService\Application\GraphQL\Exception\ForbiddenException;
use UserService\Application\GraphQL\Exception\UnauthorizedException;

final readonly class HasRoleDirective implements DirectiveResolverInterface
{

    /**
     * @param callable $next
     * @param $directiveArgs
     * @param $rootValue
     * @param $args
     * @param Context $context
     * @param ResolveInfo $info
     *
     * @return mixed
     */
    public function __invoke(callable $next, $directiveArgs, $rootValue, $args, $context, ResolveInfo $info): mixed
    {
        if (empty($context->identity)) {
            throw new UnauthorizedException();
        }

        $hasRole = false;
        foreach (explode(' ', $directiveArgs['role']) as $role) {
            $hasRole = $context->identity->hasRole($role);
            if ($hasRole) {
                break;
            }
        }

        if (false === $hasRole) {
            throw new ForbiddenException();
        }

        return $next($rootValue, $args, $context, $info);
    }
}