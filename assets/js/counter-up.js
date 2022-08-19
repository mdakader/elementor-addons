/**
 * Counter widget script
 */

(function($, elementor) {
    'use strict';
    var counterWidget = function($scope, $) {
        var counter = $scope.find(".counter");
        var delay = counter.data('delay');
        var duration = counter.data('duration');
        $scope.find('.counter').counterUp({
            delay: delay,
            time: duration
        });
        $('.counter').addClass('animated fadeInDownBig');
        $('p').addClass('animated fadeIn');

    };

    jQuery(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/counter-up.default', counterWidget);
    });

}(jQuery, window.elementorFrontend));