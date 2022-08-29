<?php

use Elementor\Icons_Manager;

$settings = $this->get_settings_for_display();
$testimonial_style = $settings['testimonial_style'];
$id = 'easy-testimonial-' . $this->get_id();
$testmonials = $settings['testimonials'];
$allow_html = [
    'a' => [
        'href' => [],
        'title' => [],
    ],
    'br' => [],
    'strong' => [],
    'em' => []
];

$this->add_render_attribute('easy-testimonial', 'id', $id);
$this->add_render_attribute('easy-testimonial', 'class', 'easy-testimonial-wrapper');
$this->add_render_attribute('easy-testimonial-slider', 'class', ['easy-testimonial-slider', 'swiper-container']);

$this->add_render_attribute([
    'easy-testimonial' => [
        'data-settings' => [
            wp_json_encode(array_filter([
                "loop" => ("yes" == $settings['infinity_loop']) ? true : false,
                "autoplay" => ("yes" == $settings["autoplay"]) ? ["delay" => $settings["autoplay_speed"]] : false,
                "speed" => $settings["animation_speed"],
                "navigation" => [
                    "nextEl" => ".easy-testimonial-button-next",
                    "prevEl" => ".easy-testimonial-button-prev",
                ],
                "pagination" => [
                    "el" => "#" . $id . " .swiper-pagination",
                    "clickable" => true,
                ],
            ]))
        ],
    ]
]);

?>
    <div class="easy-testimonial">
    <div class="easy-testimonial <?php echo esc_attr($testimonial_style); ?>">
        <div <?php $this->print_render_attribute_string('easy-testimonial'); ?>>
            <div <?php $this->print_render_attribute_string('easy-testimonial-slider'); ?>>
                <div class="swiper-wrapper">
                    <?php
                    $this->add_render_attribute('testimonial-item', 'class', 'easy-testimonial-item swiper-slide', true);
                    foreach ($testmonials as $testmonial) {
                        ?>
                        <div <?php $this->print_render_attribute_string('testimonial-item'); ?>>
                            <div class="easy-testimonial-icons">
                                <?php Icons_Manager::render_icon($testmonial['client_icon'], ['aria-hidden' => 'true']); ?>
                            </div>
                            <p><?php echo wp_kses($testmonial['client_review'], $allow_html); ?></p>
                            <h2><?php echo esc_html($testmonial['client_name']); ?></h2>
                            <h4><?php echo esc_html($testmonial['client_designation']); ?></h4>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
                if ('yes' === $settings['show_arrow']) { ?>
                    <div class="easy-testimonial-button-next">
                        <?php Icons_Manager::render_icon($settings['arrow_left_icon'], ['aria-hidden' => 'true']); ?>
                    </div>
                    <div class="easy-testimonial-button-prev">
                        <?php Icons_Manager::render_icon($settings['arrow_right_icon'], ['aria-hidden' => 'true']); ?>
                    </div>
                    <?php
                }
                if ('yes' === $settings['show_pagination']) { ?>

                    <div class="swiper-pagination"></div>
                <?php }
                ?>
            </div>
        </div>
    </div>
<?php