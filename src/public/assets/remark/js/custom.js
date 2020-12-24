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