/**
 * Skills Bar widget script
 */
(function($, elementor) {
    'use strict';
    var skillsBarWidget = function($scope, $) {
        var container = $scope.find(".skills-bar").each(function (){
            var element = $(this)[0];
            var barContainer = $scope.find(".skills-bar");
            var barNumber = barContainer.data('number');
            var color = barContainer.data('color');
            var bar = new ProgressBar.Line(element, {
                strokeWidth: 4,
                easing: 'easeInOut',
                duration: 1400,
                color: color,
                trailColor: '#eee',
                trailWidth: 1,
                svgStyle: {width: '100%', height: '100%'},
                text: {
                    style: {
                        // Text color.
                        // Default: same as stroke color (options.color)
                        color: '#999',
                        position: 'absolute',
                        right: '0',
                        top: '0px',
                        padding: 0,
                        margin: 0,
                        transform: null
                    },
                    autoStyleContainer: false
                },
                step: (state, bar) => {
                    bar.setText(Math.round(bar.value() * 100) + ' %');
                }
            });
            bar.animate(barNumber);  // Number from 0.0 to 1.0
        });



    };


    jQuery(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/easy_skills_bar.default', skillsBarWidget);
    });

}(jQuery, window.elementorFrontend));