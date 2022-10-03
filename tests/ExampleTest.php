<?php

declare(strict_types=1);

use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use OpenApiGenerator\ApiBuilder\ApiBuilder;
use OpenApiGenerator\ApiSpec\ApiSpec;
use OpenApiGenerator\Spec\HttpMethod;
use OpenApiGenerator\OpenApiGenerator;

beforeEach(function () {
    $this->generator = new OpenApiGenerator();
});

test('example', function () {
    $response = new Response(
        content: [
            "int" => 10,
            "string" => "theUser",
            "firstName" => "John",
        ],
        status: 200,
        headers: ['Content-Type' => 'application/json'],
    );
    $testResponse = new TestResponse($response);

    $path = '/tests/{userId}';


    /** @var OpenApiGenerator */
    $generator = $this->generator;

    $builder = $generator->builder(
        $testResponse,
        HttpMethod::Get,
        $path,
        [],
        [],
    );

    $apiSpec = ApiSpec::new($builder);

    $this->expect($apiSpec->toJson())->toBe([]);
});
