
// jQuery functions
(function ($) {

    // admin upload video preview
    $.fn.vidUploadPreview = function (params) {
        var iframe = $(this);
        var input_vid_src = iframe.attr('data-input-vid-src');
        var input_vid_id = iframe.attr('data-input-vid-id');

        if (input_vid_src && input_vid_id) {
            input_vid_src = $(input_vid_src);
            input_vid_id = $(input_vid_id);

            // when page loads first time
            setTimeout(() => getPreview(), 500);

            input_vid_src.on('change', function($e) {
                getPreview();
            });

            var debounce = null;
            input_vid_id.on('keyup', function($e) {
                clearTimeout(debounce);
                debounce = setTimeout(function(){
                    getPreview();
                }, 500);
            });

            const getPreview = () => {
                const src = input_vid_src.find(":selected").val();
                const id = input_vid_id.val();

                const url = generateEmbedURL(id, src);
                iframe.attr('src', url);
            }
        }

        const generateEmbedURL = (vid_id, vid_src) => {
            if (vid_id && vid_src) {
                switch (vid_src) {
                    case 'yt':
                        return `https://www.youtube.com/embed/${vid_id}`
                }
            }

            return null;
        }

        return this;
    };

})(jQuery);
