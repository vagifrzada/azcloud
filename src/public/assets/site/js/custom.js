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

$('#contact-form form').on('submit', function (e) {
    e.preventDefault();

    console.log("$('#contact-form form')")

    const form = $(this);

    console.log(form, form.serialize())

    grecaptcha.ready(function() {
        grecaptcha.execute('6Les8k0bAAAAADHEswRUgh6oekBPibg6Tt95A4lc', {action: 'submit'}).then(function(token) {
            const message = form.find('.info-message');
            $.post(form.attr('action'), form.serialize() + "&grecaptcha_token="+token, function (resp) {
                message.fadeIn();
                if (resp.success) {
                   message.html(`<p class="success">${resp.message}</p>`)
                } else {
                    message.html(`<p class="error">${resp.message}</p>`)
                }
                setTimeout(function () {
                    message.fadeOut();
                }, 5000);
        
                form[0].reset();
            });
        });
      });
});

$('#newsletter-form form').on('submit', function (e) {
    e.preventDefault();
    const form = $(this);
    $.post(form.attr('action'), form.serialize(), function () {
        form[0].reset();
    });
})