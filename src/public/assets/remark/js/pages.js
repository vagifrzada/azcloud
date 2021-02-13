const toolbar = [
    'heading', '|', 'fontfamily', 'fontsize', 'fontColor', '|',
    'outdent', 'indent', '|', 'bulletedList', 'numberedList', '|',
    'bold', 'italic', 'link', 'blockQuote',
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