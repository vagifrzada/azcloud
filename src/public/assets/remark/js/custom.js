const locales = ['az', 'ru', 'en'];
$('[data-toggle="tooltip"]').tooltip()

$(document).ready(function(){
    $('.nav-icon4').click(function(){
        $(this).toggleClass('open');
    });

    $('.fold-show').on('click', function () {
        const navIsFolded = localStorage.getItem("navFolded");

        if (navIsFolded == null || navIsFolded === "") {
            localStorage.setItem("navFolded", "true");
            return;
        }

        localStorage.removeItem("navFolded");
    });


});

// Ckeditor5 configuration.
const toolbar = [
    'heading', '|', 'fontfamily', 'fontsize', 'fontColor', '|',
    'outdent', 'indent', '|', 'bulletedList', 'numberedList', '|',
    'bold', 'italic', 'link',
];

locales.forEach((key, number) => {
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

