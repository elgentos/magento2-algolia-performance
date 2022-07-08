<?php

namespace Elgentos\AlgoliaPerformance\Observer;

use Elgentos\AlgoliaPerformance\Model\Config;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Store\Model\StoreManagerInterface;

class UpdateFrontendConfiguration implements ObserverInterface
{

    private Config $config;
    protected StoreManagerInterface $storeManager;

    public function __construct(
        Config $config,
        StoreManagerInterface $storeManager
    ) {
        $this->config = $config;
        $this->storeManager = $storeManager;
    }

    public function execute(Observer $observer)
    {

        $storeId = $this->storeManager->getStore()->getStoreId();
        $configuration = $observer->getData('configuration');

        if ($this->config->getDebounceMilliseconds($storeId)) {
            $configuration['debounce_amount'] = $this->config->getDebounceMilliseconds($storeId);
        }

        if ($this->config->getMinimumCharacters($storeId)) {
            $configuration['minimum_characters'] = $this->config->getMinimumCharacters($storeId);
        }
    }
}
