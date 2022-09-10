;(function ($) {
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/image-gallery.default', function (scope, $) {
            var imageJustify = $(scope).find("#ea-gallery");
            var justifyImage = imageJustify.data('justify-image');
            var margin = imageJustify.data('margin');

            $(scope).find('#easy-gallery').justifiedGallery({
                lastRow: justifyImage,
                rowHeight: 200,
                margins: margin,
            }).on('jg.complete', function () {
                new VenoBox({
                    selector: '.easy-image-gallery',
                    numeration: true,
                    infinigall: true,
                    share: true,
                    spinner: 'rotating-plane',
                    navigation: true
                });
            });

            var $portfolio = $(scope).find('.gallery-grid');
            if ($.fn.imagesLoaded && $portfolio.length > 0) {
                imagesLoaded($portfolio, function () {
                    $portfolio.isotope({
                        itemSelector: '.gallery-grid-item a',
                        filter: '*'
                    });
                    $(window).trigger("resize");
                });
            }
            // external js: isotope.pkgd.js, imagesloaded.pkgd.js

            // init Isotope
            // var $grid  = $(scope).find('.gallery-grid').isotope({
            //     itemSelector: '.gallery-grid-item a',
            //     percentPosition: true,
            //     masonry: {
            //         columnWidth: '.gallery-grid-sizer'
            //     }
            // });
            // layout Isotope after each image loads
            $grid.imagesLoaded().progress( function() {
                $grid.isotope('layout');
            });

        });

    });
})(jQuery);


