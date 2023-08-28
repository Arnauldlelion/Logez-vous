$(function() {
    $('.readmore').readmore({
        collapsedHeight: 190,
    });

    $('.vid-upload-preview').vidUploadPreview();
});

$(function() {
    var tiny_css = $('meta[name="tcss"]').attr('content');

    tinymce.init({
        selector: '.tiny-textarea',
        height: "300px",
        plugins: "image lists link paste",
        toolbar: "undo redo | styleselect | bold italic underline | anchor | alignleft aligncenter alignright alignjustify | numlist bullist | indent outdent | link",
        a11y_advanced_options: true,
        paste_as_text: true,
        relative_urls : false,
        remove_script_host : true,
        language: $('html').attr('lang'),
        content_css : tiny_css,
    });
});

$(function() {
    $('.stageContestantTable').DataTable({
        order: [[2, 'desc']],
        paging: false,
        info: false,
    });

    $('.stageContestantTable2').DataTable({
        order: [[1, 'desc']],
    });
});