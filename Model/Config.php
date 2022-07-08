<?php
namespace Elgentos\AlgoliaPerformance\Model;

use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;


class Config
{

    private const AUTOCOMPLETE_MIN_CHARACTERS = 'algoliasearch_performance_settings/performance_settings/min_characters';
    private const AUTOCOMPLETE_DEBOUNCE = 'algoliasearch_performance_settings/performance_settings/debounce';

    private ScopeConfigInterface $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    public function getMinimumCharacters($storeId = null): int
    {
        $minimumCharacterAmount = $this->scopeConfig->getValue(
            self::AUTOCOMPLETE_MIN_CHARACTERS,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );

        return (int)$minimumCharacterAmount;
    }


    public function getDebounceMilliseconds($storeId = null): int
    {
        $debounceMilliseconds = $this->scopeConfig->getValue(
            self::AUTOCOMPLETE_DEBOUNCE,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );

        return (int)$debounceMilliseconds;
    }

}
