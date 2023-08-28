$(function () {
    $('.preloader').hide();
    shareon();

    // Ajax Form
    $('.ajax-form').on('submit', function ($e) {
        $e.preventDefault();
        var ajaxForm = $(this);
        ajaxForm.find('button[type="submit"]')
            .append('<span class="fa fa-spinner fa-spin ml-2"></span>')
            .attr('disabled', true);

        ajaxForm.find('.is-invalid').removeClass('is-invalid');
        ajaxForm.find('.invalid-feedback, .gr-error').remove();

        $.ajax({
            type: 'POST',
            url: ajaxForm.attr('action'),
            data: ajaxForm.serialize(),
            success: function (response) {
                if (response.status === 'success') {
                    toastr.info(response.message);
                    ajaxForm[0].reset()
                } else if (response.status === 'validation_error') {
                    if(response.message) {
                        toastr.error(response.message);
                    }

                    for(var error in response.errors) {
                        if (error === 'g-recaptcha-response') {
                            ajaxForm.find('.g-recaptcha')
                                .append('<small class="gr-error text-danger">'+response.errors[error][0]+'</small>')
                        } else {
                            ajaxForm.find('[name="'+error+'"]').addClass('is-invalid');
                            ajaxForm.find('[name="'+error+'"]')
                                .closest('.form-group')
                                .append('<span class="invalid-feedback">'+response.errors[error][0]+'</span>');
                        }
                    }
                } else if (response.status === 'error') {
                    toastr.error(response.message);
                }

                ajaxForm.find('button[type="submit"] .fa-spinner').remove();
                ajaxForm.find('button[type="submit"]').attr('disabled', false);
            },
            error: function (reponse) {
                toastr.error('An unexpected error occurred');
                ajaxForm.find('button[type="submit"] .fa-spinner').remove();
                ajaxForm.find('button[type="submit"]').attr('disabled', false);
            }
        });

    });
});
