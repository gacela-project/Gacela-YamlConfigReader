<?php

declare(strict_types=1);

namespace Gacela\Framework\Config\ConfigReader;

use Gacela\Framework\Config\ConfigReaderInterface;
use Gacela\Framework\Event\ConfigReader\ReadYamlConfigEvent;
use Gacela\Framework\Event\Dispatcher\EventDispatchingCapabilities;
use Symfony\Component\Yaml\Yaml;

final class YamlConfigReader implements ConfigReaderInterface
{
    use EventDispatchingCapabilities;

    /**
     * @return array<string,mixed>
     */
    public function read(string $absolutePath): array
    {
        if (!$this->canRead($absolutePath)) {
            return [];
        }

        $this->dispatchEvent(new ReadYamlConfigEvent($absolutePath));

        /** @var null|array<string,mixed> $content */
        $content = Yaml::parseFile($absolutePath);

        return is_array($content) ? $content : [];
    }

    private function canRead(string $absolutePath): bool
    {
        $extension = pathinfo($absolutePath, PATHINFO_EXTENSION);

        return ('yaml' === $extension || 'yml' === $extension)
            && file_exists($absolutePath);
    }
}
