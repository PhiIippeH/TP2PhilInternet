(function ($) {
    // Get the path to action from CakePHP
    var autoCompleteSource = urlToAutocompleteAction;
    $('#pays').autocomplete({
        source: autoCompleteSource,
        minLength: 1
    });
})(jQuery);

