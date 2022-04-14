<?php

declare(strict_types=1);

namespace GacelaTest\Integration\Framework\UsingYamlConfigFromBootstrap;

use Gacela\Framework\Config\ConfigReader\YamlConfigReader;
use Gacela\Framework\Config\GacelaConfigBuilder\ConfigBuilder;
use Gacela\Framework\Gacela;
use Gacela\Framework\Setup\SetupGacela;
use PHPUnit\Framework\TestCase;

final class IntegrationTest extends TestCase
{
    public function setUp(): void
    {
        $setup = (new SetupGacela())
            ->setConfig(static function (ConfigBuilder $configBuilder): void {
                $configBuilder->add('config/*.{yaml,yml}', 'config/local.yaml', YamlConfigReader::class);
            });

        Gacela::bootstrap(__DIR__, $setup);
    }

    public function test_read_config_values_yaml_yml_from_bootstrap(): void
    {
        $facade = new LocalConfig\Facade();

        self::assertSame(
            [
                'config_yml' => 'YML_CONFIG',
                'config_yaml' => 'YAML_CONFIG',
                'override' => 'YAML_OVERRIDE',
            ],
            $facade->doSomething()
        );
    }
}
