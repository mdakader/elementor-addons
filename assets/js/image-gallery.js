;(function ($) {
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/image-gallery.default', function (scope, $) {
            var imageJustify = $(scope).find("#ea-gallery");
            var justifyImage = imageJustify.data('justify-image');
            var margin = imageJustify.data('margin');

            $(scope).find('#ea-gallery').justifiedGallery({
                lastRow: justifyImage,
                rowHeight: 200,
                margins: margin,
            }).on('jg.complete', function () {
                new VenoBox({
                    selector: '.ea-image-gallery',
                    numeration: true,
                    infinigall: true,
                    share: true,
                    spinner: 'rotating-plane',
                    navigation: true
                });
            });
        });

    });
})(jQuery);


