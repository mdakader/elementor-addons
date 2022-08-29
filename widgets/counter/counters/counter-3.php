<?php

use Elementor\Icons_Manager;

$settings = $this->get_settings_for_display();
$counter_style = $settings['counter_style'];
$counter_number = $settings['counter-number'];
$counter_desc = $settings['counter-desc'];
$counter_icon = $settings['counter-icon'];
$suffix = $settings['suffix'];
$counter_delay = $settings['counter-delay'];
$counter_duration = $settings['counter-duration'];

?>

<div class="easy-counter-up">
    <div class="easy-counter <?php echo esc_attr($counter_style); ?>">
        <?php if (!empty($counter_number)): ?>
            <p class="counter-number">
                <span class="counter"
              data-delay="<?php echo esc_attr($counter_delay); ?>"
              data-duration="<?php echo esc_attr($counter_duration); ?>"
              id="counter">
              <?php echo esc_html($counter_number) ?>
            </span>
            </p>
        <?php endif; ?>
        <div class="counter-icon">
            <?php
            Icons_Manager::render_icon($counter_icon, ['aria-hidden' => 'true']); ?>
            <?php ?>
        </div>
        <?php if (!empty($counter_desc)): ?>
            <p class="counter-desc"><?php echo esc_html($counter_desc) ?></p>
        <?php endif; ?>
    </div>
</div>