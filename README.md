# Gacela YamlConfigReader

Load configuration files with yaml/yml extension.

You must set the Config Readers in the bootstrap of your application
```php
Config::setConfigReaders([
    'yaml' => new YamlConfigReader(),
    'yml' => new YamlConfigReader(),
    // ...
]);
```

## Installation

```bash
composer require gacela-project/gacela-yaml-config-reader
```
