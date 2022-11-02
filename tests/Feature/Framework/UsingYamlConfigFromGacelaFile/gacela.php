<?php

declare(strict_types=1);

use Gacela\Framework\Bootstrap\GacelaConfig;
use Gacela\Framework\Config\ConfigReader\YamlConfigReader;

return static function (GacelaConfig $config): void {
    $config->addAppConfig('config/*.{yaml,yml}', 'config/local.yaml', YamlConfigReader::class);
};
