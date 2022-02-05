# Gacela YamlConfigReader

Load yaml/yml configuration files for your Gacela projects.

```bash
composer require gacela-project/gacela-yaml-config-reader
```

## Setup

You must define in the `Gacela::bootstrap()` the configuration for the `yaml`/`yml` files.

- The first parameter refers to the `$rootAppDir`
- The second parameter refers to the `$globalServices`, you can define the settings in an external `gacela.php` file 
  (recommended way) or inline
- The third parameter refers to the `$configReaders`, the key should match with the `$globalServices['config']['type']`,
  additionally, the parameter is an array because you can define more than one reader

### Option A)

Define the `ConfigReader` in your bootstrap

```php
Gacela::bootstrap(__DIR__, [], ['yaml' => new \Gacela\Framework\Config\ConfigReader\YamlConfigReader()]);
```

And set the configuration in a `gacela.php` file in the root of your project:

```php
<?php # gacela.php
use Gacela\Framework\AbstractConfigGacela;

return static fn () => new class() extends AbstractConfigGacela {
    public function config(): array
    {
        return [
            'type' => 'yaml',
            'path' => 'config/*.{yaml,yml}',
            'path_local' => 'config/local.yaml',
        ];
    }
};
```

### Option B)

Define all configuration on the fly in the bootstrap itself.

```php
Gacela::bootstrap(
    __DIR__,
    [
        'config' => [
            [
                'type' => 'yaml',
                'path' => 'config/*.{yaml,yml}',
                'path_local' => 'config/local.yaml',
            ],
        ],
    ],
    ['yaml' => new \Gacela\Framework\Config\ConfigReader\YamlConfigReader()]
);
```

### You can define more than one `ConfigReader` at once.

```php
$globalServices = [
    'config' => [
        [
            'type' => 'php',
            'path' => 'config/*.php',
            'path_local' => 'config/local.php',
        ],
        [
            'type' => 'yaml',
            'path' => 'config/*.{yaml,yml}',
            'path_local' => 'config/local.yaml',
        ],
    ],
];

$configReaders = [
    'php' => new \Gacela\Framework\Config\ConfigReader\PhpConfigReader(),
    'yaml' => new \Gacela\Framework\Config\ConfigReader\YamlConfigReader(),
];

Gacela::bootstrap(__DIR__, $globalServices, $configReaders);
```
