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

return fn () => new class() extends AbstractConfigGacela 
{
    public function config(ConfigBuilder $configBuilder): void
    {
        $configBuilder->add(YamlConfigReader::class, 'config/*.{yaml,yml}', 'config/local.yaml');
    }
}
```

### Option B)

Define all configuration on the fly in the bootstrap itself.

```php
<?php  # public/index.php

Gacela::bootstrap($appRootDir, [
    'config' => function (ConfigBuilder $configBuilder): void {
        $configBuilder->add(YamlConfigReader::class, 'config/*.{yaml,yml}', 'config/local.yaml');
    }
]);
```

### You can define more than one `ConfigReader` at once.

```php
Gacela::bootstrap($appRootDir, [
    'config' => function (ConfigBuilder $configBuilder): void {
        $configBuilder->add(PhpConfigReader::class, 'config/*.php', 'config/local.php');
        $configBuilder->add(YamlConfigReader::class, 'config/*.{yaml,yml}', 'config/local.yaml.dist');
    }
]);
```
