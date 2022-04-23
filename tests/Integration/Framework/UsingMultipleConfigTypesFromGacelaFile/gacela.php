<?php

declare(strict_types=1);

use Gacela\Framework\Config\ConfigReader\YamlConfigReader;
use Gacela\Framework\Config\GacelaConfigBuilder\ConfigBuilder;
use Gacela\Framework\Setup\SetupGacela;

return (new SetupGacela())
    ->setConfig(static function (ConfigBuilder $configBuilder): void {
        $configBuilder->add('config/*.php');
        $configBuilder->add('config/*.{yaml,yml}', 'config/local.yaml', YamlConfigReader::class);
    });
