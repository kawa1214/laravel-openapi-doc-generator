<?php

declare(strict_types=1);

namespace OpenApiGenerator\ApiBuilder;

use OpenApiGenerator\Spec\HttpMethod;

final class ApiBuilder
{
    public string $path;
    public HttpMethod $method;

    public static function new(): ApiBuilder
    {
        return new ApiBuilder();
    }

    public function setPath(string $path): ApiBuilder
    {
        $this->path = $path;
        return $this;
    }

    public function setHttpMethod(HttpMethod $method): ApiBuilder
    {
        $this->method = $method;
        return $this;
    }
}
