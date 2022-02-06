<?php

declare(strict_types=1);

use Gacela\Framework\AbstractConfigGacela;

return static fn () => new class () extends AbstractConfigGacela {
    public function config(): array
    {
        return [
            'type' => 'yaml',
            'path' => 'config/*.{yaml,yml}',
            'path_local' => 'config/local.yaml',
        ];
    }
};
