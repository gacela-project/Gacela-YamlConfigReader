<?php

declare(strict_types=1);

namespace GacelaTest\Integration\Framework\UsingMultipleConfigTypes;

use Gacela\Framework\Config\ConfigReader\PhpConfigReader;
use Gacela\Framework\Config\ConfigReader\YamlConfigReader;
use Gacela\Framework\Gacela;
use PHPUnit\Framework\TestCase;

final class IntegrationTest extends TestCase
{
    public function setUp(): void
    {
        $configReaders = [
            'php' => new PhpConfigReader(),
            'yaml' => new YamlConfigReader(),
            'yml' => new YamlConfigReader(),
        ];

        Gacela::bootstrap(__DIR__, [], $configReaders);
    }

    public function test_read_config_values_php_yaml_yml(): void
    {
        $facade = new LocalConfig\Facade();

        self::assertSame(
            [
                'config_php' => 'PHP_CONFIG',
                'config_yml' => 'YML_CONFIG',
                'config_yaml' => 'YAML_CONFIG',
                'override' => 'YAML_OVERRIDE',
            ],
            $facade->doSomething()
        );
    }
}
