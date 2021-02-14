locales.forEach((key) => {
    ClassicEditor
        .create(document.querySelector(`#content-${key}`), {
            toolbar:  [
                'heading', '|', 'fontfamily', 'fontsize', 'fontColor', '|',
                'outdent', 'indent', '|', 'bulletedList', 'numberedList', '|',
                'bold', 'italic', 'link', 'blockQuote'
            ],
        })
        .catch(error => {
            console.error(error);
        });
})