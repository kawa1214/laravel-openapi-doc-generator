<?php

declare(strict_types=1);

namespace OpenApiGenerator\Spec;

enum HttpMethod: string
{
    case Get = 'get';
    case Post = 'post';
    case Put = 'put';
    case Patch = 'patch';
    case Delete = 'delete';
    case Head = 'head';
    case Options = 'options';
    case Trace = 'trace';

    public static function fromValue(string $value): HttpMethod
    {
        return match ($value) {
            'get' => self::Get,
            'post' => self::Post,
            'put' => self::Put,
            'patch' => self::Patch,
            'delete' => self::Delete,
            'head' => self::Head,
            'options' => self::Options,
            'trace' => self::Trace,
            default => throw new \InvalidArgumentException('Invalid arguments'),
        };
    }
}
