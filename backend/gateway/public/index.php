<?php

use DI\Bridge\Slim\Bridge;
use DI\ContainerBuilder;
use Gateway\Service\System;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/../vendor/autoload.php';

// Dependency Container
$builder = new ContainerBuilder();
$builder->addDefinitions(...glob(__DIR__ . DIRECTORY_SEPARATOR .'../../app/services'));
$container = $builder->build();

$app = Bridge::create($container);

// Routes
$app->get('/health', function (Request $request, Response $response) use ($container) {
    /** @var System $system */
    $system = $container->get(System::class);

    $response
        ->withAddedHeader('Content-type', 'application/json')
        ->withAddedHeader('Accept', 'application/json')
        ->getBody()->write(json_encode([
            'environment' => $system->getEnvironment(),
        ]));

    return $response;
});

$app->run();
