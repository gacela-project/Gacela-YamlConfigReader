# Gacela YamlConfigReader

Load yaml/yml configuration files for your Gacela projects.

```bash
composer require gacela-project/gacela-yaml-config-reader
```

## Setup

You can define the reader configuration either in the `Gacela::bootstrap()` or in a `gacela.php` file.

### Option A)

Define the configuration in a `gacela.php` file in the root of your project (recommended way):

```php
<?php # gacela.php

use Gacela\Framework\Bootstrap\GacelaConfig;
use Gacela\Framework\Config\ConfigReader\YamlConfigReader;

return static function (GacelaConfig $config): void {
    $config->addAppConfig('config/*.{yaml,yml}', 'config/local.yaml', YamlConfigReader::class);
};
```

### Option B)

Define all configuration on the fly in the bootstrap itself.

```php
<?php  # public/index.php

use Gacela\Framework\Bootstrap\GacelaConfig;
use Gacela\Framework\Config\ConfigReader\YamlConfigReader;
use Gacela\Framework\Gacela;

$config = static function (GacelaConfig $config): void {
    $config->addAppConfig('config/*.{yaml,yml}', 'config/local.yaml', YamlConfigReader::class);
};

Gacela::bootstrap($appRootDir, $config);
```

#### You can define more than one `ConfigReader` at once.

```php
$config = static function (GacelaConfig $config): void {
    $config->addAppConfig('config/*.{yaml,yml}', 'config/local.yaml', YamlConfigReader::class);
    $config->addAppConfig('config/*.php', 'config/local.php');
    $config->addAppConfig('config/*.custom', '', CustomConfigReader::class);
}
```
