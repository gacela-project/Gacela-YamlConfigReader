<?php

declare(strict_types=1);

use Gacela\Framework\AbstractConfigGacela;
use Gacela\Framework\Config\ConfigReader\PhpConfigReader;
use Gacela\Framework\Config\ConfigReader\YamlConfigReader;
use Gacela\Framework\Config\GacelaConfigBuilder\ConfigBuilder;

return static fn () => new class () extends AbstractConfigGacela {
    public function config(ConfigBuilder $configBuilder): void
    {
        $configBuilder->add(PhpConfigReader::class, 'config/*.php');
        $configBuilder->add(YamlConfigReader::class, 'config/*.{yaml,yml}', 'config/local.yaml');
    }
};
