<?php

use Elementor\Icons_Manager;

$settings = $this->get_settings_for_display();

$service_style = $settings['service_style'];

$service_title = $this->get_settings('service_title');
$this->add_render_attribute('service_title', 'class', 'easy-service-title');

$service_desc = $this->get_settings('service_desc');
$this->add_render_attribute('service_desc', 'class', 'easy-service-description');

$service_link_text = $this->get_settings('service_link_text');
$this->add_render_attribute('service_link_text', 'class', 'easy-service-link');

?>
    <div class="easy-services-wrapper">
        <div class="easy-services <?php echo esc_attr($service_style); ?>">
            <div class="easy-services-item">
                <?php if ($settings['service_icon']) : ?>
                    <div class="service-icon">
                        <?php
                        Icons_Manager::render_icon($settings['service_icon'], ['aria-hidden' => 'true']); ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($service_title)): ?>
                    <h2 <?php $this->print_render_attribute_string('service_title') ?>> <?php echo esc_html($service_title); ?></h2>
                <?php endif; ?>

                <?php if (!empty($service_desc)): ?>
                    <p <?php $this->print_render_attribute_string('service_desc') ?>> <?php echo esc_html($service_desc); ?></p>
                <?php endif; ?>

                <?php
                if (!empty($settings['service_link']['url'])) {
                    $this->add_link_attributes('service_link', $settings['service_link']);
                }
                ?>
                <a <?php $this->print_render_attribute_string('service_link'); ?><?php $this->print_render_attribute_string('service_link_text'); ?>>
                    <?php echo esc_html($service_link_text); ?>
                </a>

            </div>
        </div>
    </div>
<?php
