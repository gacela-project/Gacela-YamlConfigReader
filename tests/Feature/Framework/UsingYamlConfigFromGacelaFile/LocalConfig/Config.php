<?php

declare(strict_types=1);

namespace GacelaTest\Feature\Framework\UsingYamlConfigFromGacelaFile\LocalConfig;

use Gacela\Framework\AbstractConfig;

final class Config extends AbstractConfig
{
    public function getArrayConfig(): array
    {
        return [
            'config_yml' => $this->get('config_yml'),
            'config_yaml' => $this->get('config_yaml'),
            'override' => $this->get('override'),
        ];
    }
}
