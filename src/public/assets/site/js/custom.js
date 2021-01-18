$(document).on('ready', function () {
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
});

$('.load-more a').on('click', function (e) {
    e.preventDefault();
    const link = $(this);
    const container = $('.load-container');
    const data = {timestamp: $('.post-item:last').data('created'), template: link.data('template')};
    $.get(link.attr('href'), data, function (resp) {
        if (!resp.success) {
            link.fadeOut();
            return false;
        }
        container.append(resp.data);
    });
});