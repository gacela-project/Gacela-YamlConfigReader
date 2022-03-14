<?php

declare(strict_types=1);

namespace GacelaTest\Integration\Framework\UsingMultipleConfigTypesFromGacelaFile\LocalConfig;

use Gacela\Framework\AbstractConfig;

final class Config extends AbstractConfig
{
    public function getArrayConfig(): array
    {
        return [
            'config_php' => $this->get('config_php'),
            'config_yml' => $this->get('config_yml'),
            'config_yaml' => $this->get('config_yaml'),
            'override' => $this->get('override'),
        ];
    }
}
