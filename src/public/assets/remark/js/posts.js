// Ckeditor5 configuration.
const toolbar = [
    'heading', '|', 'fontfamily', 'fontsize', 'fontColor', '|',
    'outdent', 'indent', '|', 'bulletedList', 'numberedList', '|',
    'bold', 'italic', 'link',
];

locales.forEach((key) => {
    ClassicEditor
        .create(document.querySelector(`#content-${key}`), {
            toolbar: toolbar,
        })
        .catch(error => {
            console.error(error);
        });
})


$('select[data-selectable]').each(function (key, item) {
    const selector = $('#' + item.id);

    // Configuration.
    let preparedForXhr = typeof selector.data('xhr-route') !== 'undefined';
    let preparedForTags = typeof selector.data('tags') !== 'undefined';
    let preparedForMultiple = typeof selector.attr('multiple') !== 'undefined';
    let inputLength = (typeof selector.data('inputlength') !== 'undefined');
    let placeholder = (typeof selector.data('placeholder') !== 'undefined') ? selector.data('placeholder') : '-';

    let config = {placeholder: placeholder};

    if (inputLength)
        config.minimumInputLength = parseInt(selector.data('inputlength'));

    if (preparedForMultiple) {
        config.multiple = selector.attr('multiple');
        config.allowClear = true;
    }

    if (preparedForTags)
        config.tags = selector.data('tags');

    if (preparedForXhr) {
        config.ajax = {
            url: selector.attr('data-xhr-route'),
            dataType: 'json',
            quietMillis: 100,
            data: function (term) {
                // language: selector.attr('data-language'),
                return { term: term.term };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {id: item.id, text: item.text};
                    })
                };
            }
        }
    }

    // Initialization.
    selector.select2(config);
});