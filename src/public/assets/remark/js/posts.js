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

$('select[data-selectable]').select2({
    tags: true,
    multiple: true,
    placeholder: 'Enter some tags',
});
