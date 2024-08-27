<?php

namespace GraphqlApp\Application\Controller;

use GraphQL\Error\DebugFlag;
use GraphQL\GraphQL;
use GraphQL\Server\ServerConfig;
use GraphQL\Server\StandardServer;
use GraphQL\Type\Schema;
use GraphQL\Validator\Rules;
use GraphqlApp\Application\GraphQL\TypeRegistry;
use Symfony\Bridge\PsrHttpMessage\HttpMessageFactoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GraphqlController extends AbstractController
{
    private HttpMessageFactoryInterface $httpMessageFactory;
    private TypeRegistry $typeRegistry;
    private bool $debugMode;

    public function __construct(
        TypeRegistry $typeRegistry,
        HttpMessageFactoryInterface $httpMessageFactory,
        $debugMode = false
    ) {
        $this->httpMessageFactory = $httpMessageFactory;
        $this->typeRegistry = $typeRegistry;
        $this->debugMode = $debugMode;
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
        ;

        $server = new StandardServer($config);
        $result = $server->executePsrRequest($psrRequest);
        return new JsonResponse($result);
    }
}
