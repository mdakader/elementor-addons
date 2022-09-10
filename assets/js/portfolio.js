/**
 * Counter widget script
 */

// ( function( $ ) {
//     var WidgetFilterHandler = function( $scope, $ ) {
//         var pixifilter = $('.pixi-grid2');
//         if(pixifilter.length){
//             $('.pixi-grid2').imagesLoaded(function() {
//                 $('.pixi-filter').on('click', 'button', function() {
//                     var filterValue = $(this).attr('data-filter');
//                     var $grid = $(this).closest('.pixi-portfolio').find('.pixi-grid2');
//                     $grid.isotope({
//                         filter: filterValue,
//                         itemSelector: '.grid-item',
//                         percentPosition: true,
//                         masonry: {
//                             columnWidth: '.grid-item',
//                         }
//                     });
//                 });
//             });
//         }
//
//
//     };
//
//     // Make sure you run this code under Elementor.
//     $( window ).on( 'elementor/frontend/init', function() {
//         elementorFrontend.hooks.addAction( 'frontend/element_ready/pixi-img-gallery-custom-filter.default', WidgetFilterHandler );
//     } );
// } )( jQuery );

(function ($, elementor) {
    // 'use strict';

    var WidgetFilterHandler = function ($scope, $) {
        var gallery = $('#gallery');
        var boxes = $('.revGallery-anchor');
        if (gallery.length) {
            boxes.hide();

            gallery.imagesLoaded({background: true}, function () {
                boxes.fadeIn();

                gallery.isotope({
                    // options
                    sortBy: 'original-order',
                    layoutMode: 'fitRows',
                    itemSelector: '.revGallery-anchor',
                    stagger: 30,
                });
            });

            $('button').on('click', function () {
                var filterValue = $(this).attr('data-filter');
                $('#gallery').isotope({filter: filterValue});
                gallery.data('lightGallery').destroy(true);
                gallery.lightGallery({
                    selector: filterValue.replace('*', '')
                });
            });

            $("#gallery").lightGallery({});


            //button active mode
            $('.button').click(function () {
                $('.button').removeClass('is-checked');
                $(this).addClass('is-checked');
            });


            //CSS Gram Filters on Mouse enter
            $("#gallery a .nak-gallery-poster").addClass("inkwell");

            $("#gallery a").on({
                mouseenter: function () {
                    $(this).find(".nak-gallery-poster").removeClass("inkwell").addClass("walden");
                },
                mouseleave: function () {
                    $(this).find(".nak-gallery-poster").removeClass("walden").addClass("inkwell");
                }
            });
        }
    }
    jQuery(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/easy_portfolio.default', WidgetFilterHandler);
    });

}(jQuery, window.elementorFrontend));