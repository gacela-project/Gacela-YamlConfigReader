<?php

declare(strict_types=1);

namespace GacelaTest\Feature\Framework\UsingYamlConfigFromGacelaFile;

use Gacela\Framework\Bootstrap\GacelaConfig;
use Gacela\Framework\Gacela;
use PHPUnit\Framework\TestCase;

final class IntegrationTest extends TestCase
{
    public function setUp(): void
    {
        Gacela::bootstrap(__DIR__, static function (GacelaConfig $config): void {
            $config->resetInMemoryCache();
        });
    }

    public function test_read_config_values_yaml_yml_from_gacela_file(): void
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
