<?php

declare(strict_types=1);

namespace GacelaTest\Unit\Framework\Event\ConfigReader;

use Gacela\Framework\Event\ConfigReader\ReadYamlConfigEvent;
use PHPUnit\Framework\TestCase;

final class ReadYamlConfigEventTest extends TestCase
{
    public function test_absolute_path(): void
    {
        $event = new ReadYamlConfigEvent(__DIR__);

        self::assertSame(__DIR__, $event->absolutePath());
    }

    public function test_config_event_to_string(): void
    {
        $event = new ReadYamlConfigEvent(__DIR__);

        $expected = ReadYamlConfigEvent::class . ' - ' . __DIR__;
        self::assertSame($expected, $event->toString());
    }
}
