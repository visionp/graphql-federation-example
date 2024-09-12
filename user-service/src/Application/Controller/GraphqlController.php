<?php

namespace UserService\Application\Controller;

use GraphQL\GraphQL;
use GraphQL\Server\ServerConfig;
use GraphQL\Server\StandardServer;
use GraphQL\Type\Schema;
use GraphQL\Validator\Rules;
use UserService\Application\GraphQL\Context;
use UserService\Application\GraphQL\ErrorHandler\ErrorHandler;
use UserService\Domain\Entity\Identity;
use Psr\Log\LoggerInterface;
use UserService\Application\GraphQL\TypeRegistry;
use Symfony\Bridge\PsrHttpMessage\HttpMessageFactoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GraphqlController extends AbstractController
{
    public function __construct(
        private readonly TypeRegistry $typeRegistry,
        private readonly HttpMessageFactoryInterface $httpMessageFactory,
        private readonly LoggerInterface $logger
    ) {
    }

    #[Route('/graphql', name: 'graphql')]
    public function __invoke(Request $request): Response
    {
        $validatorRules = array_merge(
            GraphQL::getStandardValidationRules(),
            [
                new Rules\QueryComplexity(PHP_INT_MAX),
                new Rules\QueryDepth(PHP_INT_MAX),
            ]
        );
        $psrRequest = $this->httpMessageFactory
            ->createRequest($request)
            ->withParsedBody(json_decode($request->getContent(), true))
        ;


        $config = ServerConfig::create()
            ->setSchema(new Schema([
                'query' => $this->typeRegistry->getType('Query'),
                'mutation' => $this->typeRegistry->getType('Mutation'),
                'typeLoader' => fn($name) => $this->typeRegistry->getType($name),
            ]))
            ->setRootValue([])
            ->setValidationRules($validatorRules)
            ->setContext(new Context($this->extractIdentity($request)))
            ->setErrorsHandler(new ErrorHandler($this->logger))
        ;

        $server = new StandardServer($config);
        $result = $server->executePsrRequest($psrRequest);
        return new JsonResponse($result);
    }

    private function extractIdentity(Request $request): ?Identity
    {
        if (!$request->headers->has('x-id-user')) {
            return null;
        }

        return new Identity(
            id: $request->headers->get('x-id-user'),
            name: $request->headers->get('x-name-user'),
            roles: explode(',', $request->headers->get('x-roles-user')),
        );
    }
}
