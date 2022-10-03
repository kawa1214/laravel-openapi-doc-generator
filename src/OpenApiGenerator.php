<?php

declare(strict_types=1);

namespace OpenApiGenerator;

use OpenApiGenerator\Spec\HttpMethod;
use Illuminate\Testing\TestResponse;
use OpenApiGenerator\ApiBuilder\ApiBuilder;
use OpenApiGenerator\ApiSpec\ApiSpec;
use OpenApiGenerator\Exceptions\OpenApiGeneratorException;

final class OpenApiGenerator
{
    // TODO: configをもたせる

    /**
     * @param array<string, mixed> $body
     * @param array<string, mixed> $headers
     */
    public function generate(
        TestResponse $response,
        HttpMethod $method,
        string $path,
        array $body,
        array $headers,
    ): void {
        if ($method === HttpMethod::Get && $body !== []) {
            throw OpenApiGeneratorException::message('GET method is not supported body');
        }

        $builder = $this->builder(
            $response,
            $method,
            $path,
            $body,
            $headers,
        );

        $apiSpec = ApiSpec::new($builder);
    }

    /**
     * @param array<string, mixed> $body
     * @param array<string, mixed> $headers
     */
    public function builder(
        TestResponse $response,
        HttpMethod $method,
        string $path,
        array $body,
        array $headers,
    ): ApiBuilder {
        return ApiBuilder::new()
            ->setPath($path)
            ->setHttpMethod($method);
    }
}
