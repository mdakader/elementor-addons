<?php

use Elementor\Icons_Manager;

$settings = $this->get_settings_for_display();
$pricing_card_style = $settings['pricing_card_style'];

?>
<div class="easy-pricing-table">
    <div class="easy-pricing-table-item <?php echo esc_attr($pricing_card_style); ?>">
        <div class="pricing-table">
            <?php if(!empty($settings['price_badge_title'])):?>
                <span class="recommended-badge"><?php echo esc_html($settings['price_badge_title']);?></span>
            <?php endif;?>
            <div class="pricing-table-header">
                <h3 class="title"><?php echo esc_html($settings['price_table_title'])?></h3>
                <div class="price-value">
                    <span class="amount"><span class="currency"><?php echo esc_html($settings['price_currency'])?></span><?php echo esc_html($settings['price_table_amount'])?></span>
                    <span class="duration"><?php echo esc_html($settings['price_duration']);?></span>
                </div>
            </div>
            <ul class="pricing-content">
                <?php
                if ($settings['featured_list']) {
                    foreach ($settings['featured_list'] as $item) { ?>
                        <li>

                            <?php if (!empty($item['selected_icon'])): ?>
                                <span class="price-featured-icon">
                                <?php
                                if (!empty($item['selected_icon'])) {
                                    Icons_Manager::render_icon($item['selected_icon'], ['aria-hidden' => 'true']);
                                } else { ?>
                                    <i class="fas fa-check" aria-hidden="true"></i>
                                <?php } ?>
						    </span>
                            <?php endif; ?>

                            <?php if (!empty($item['featured_title'])): ?>
                                <span class="price-featured-title">
                                    <?php echo esc_html($item['featured_title']); ?>
                                </span>
                            <?php endif; ?>

                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
            <div class="price-table-signup">
                <?php
                if (!empty($settings['price_signup_link']['url'])) {
                    $this->add_link_attributes('price_signup_link', $settings['price_signup_link']);
                }
                ?>
                <a <?php echo $this->get_render_attribute_string('price_signup_link'); ?>>
                    <?php echo esc_html($settings['price_signup_text']);?>
                </a>
            </div>
            <?php if(!empty($settings['price_badge_title'])):?>
            <?php endif;?>
        </div>
    </div>
</div>