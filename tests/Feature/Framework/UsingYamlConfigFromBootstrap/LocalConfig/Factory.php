<?php

declare(strict_types=1);

namespace GacelaTest\Feature\Framework\UsingYamlConfigFromBootstrap\LocalConfig;

use Gacela\Framework\AbstractFactory;

/**
 * @method Config getConfig()
 */
final class Factory extends AbstractFactory
{
    public function getArrayConfig(): array
    {
        return $this->getConfig()->getArrayConfig();
    }
}
