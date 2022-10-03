<?php

declare(strict_types=1);

namespace OpenApiGenerator\ApiSpec;

use OpenApiGenerator\ApiBuilder\ApiBuilder;
use OpenApiGenerator\Exceptions\OpenApiGeneratorException;
use OpenApiGenerator\Spec\HttpMethod;

// TODO: json と ApiBuilder, Config 相互変換をする
final class ApiSpec
{
    public static function new(ApiBuilder $apiBuilder): ApiSpec
    {
        return new ApiSpec();
    }

    /** @return array<string, mixed> */
    public function toJson(): string
    {
        $endoed = json_encode([]);

        if (!$endoed) {
            throw new OpenApiGeneratorException('json_encode failed');
        }

        return $endoed;
    }
}
