<?php

declare(strict_types=1);

namespace UserService\Application\GraphQL\Directive;

use Axtiva\FlexibleGraphql\Resolver\DirectiveResolverInterface;
use GraphQL\Type\Definition\ResolveInfo;
use UserService\Application\GraphQL\Exception\ForbiddenException;
use UserService\Application\GraphQL\Exception\UnauthorizedException;

final readonly class HasRoleDirective implements DirectiveResolverInterface
{

    public function __invoke(callable $next, $directiveArgs, $rootValue, $args, $context, ResolveInfo $info)
    {
        if (empty($context->getUser())) {
            throw new UnauthorizedException();
        }

        $hasRole = false;
        foreach (explode(' ', $directiveArgs['role']) as $role) {
            $hasRole = $context->getUser()->hasRole($role);
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