<?php

declare(strict_types=1);

namespace OpenApiGenerator\Exceptions;

use ErrorException;

final class OpenApiGeneratorException extends ErrorException
{
    public static function message(string $message): self
    {
        return new self($message);
    }
}