<?php

namespace Elgentos\AlgoliaPerformance\Observer;

use Elgentos\AlgoliaPerformance\Model\Config;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class UpdateFrontendConfiguration implements ObserverInterface
{

    private Config $config;

    public function __construct(
        Config $config
    ) {
        $this->config = $config;
    }

    public function execute(Observer $observer)
    {
        $configuration = $observer->getData('configuration');

        if ($this->config->getDebounceMilliseconds()) {
            $configuration['debounce_amount'] = $this->config->getDebounceMilliseconds();
        }

        if ($this->config->getMinimumCharacters()) {
            $configuration['minimum_characters'] = $this->config->getMinimumCharacters();
        }
    }
}
