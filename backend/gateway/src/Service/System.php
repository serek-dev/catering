<?php

declare(strict_types=1);

namespace Gateway\Service;

use RuntimeException;

final class System
{
    public function getEnvironment(): string
    {
        return getenv('APP_ENV') ?? throw new RuntimeException('APP_ENV not defined!');
    }
}
