algolia.registerHook("beforeAutocompleteOptions", function (options) {
  if (algoliaConfig.minimum_characters) {
    options.minLength = algoliaConfig.minimum_characters;
  }

  return options;
});

algolia.registerHook("beforeAutocompleteSources", function (sources) {
  if (algoliaConfig.debounce_amount) {
    sources.map((source) => {
      source.debounce = algoliaConfig.debounce_amount;
    });
  }

  return sources;
});
