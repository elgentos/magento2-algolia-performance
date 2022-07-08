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

        return array_replace(
            (array)$observer->getData('configuration'),
            [
                'debounce_amount' => $this->config->getDebounceMilliseconds($storeId),
                'minimum_characters' => $this->config->getMinimumCharacters($storeId)
            ]
        );
    }
}
