(function ($, elementor) {
  'use strict';
  var widgetTestimonial = function ($scope, $) {

      var $testimonial = $scope.find('.easy-testimonial-wrapper');
      if (!$testimonial.length) {
          return;
      }
      var $testimonialContainer = $testimonial.find('.easy-testimonial-slider'),
          $settings = $testimonial.data('settings');

      const Swiper = elementorFrontend.utils.swiper;
      initSwiper();
      async function initSwiper() {
          var swiper = await new Swiper($testimonialContainer, $settings);
      }

  };

  jQuery(window).on('elementor/frontend/init', function () {
      elementorFrontend.hooks.addAction('frontend/element_ready/easy_testimonial.default', widgetTestimonial);
  });

}(jQuery, window.elementorFrontend));