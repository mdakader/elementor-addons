<?php

use Elementor\Icons_Manager;

$team_style = $settings['team_style'];

$team_name = $this->get_settings('team_name');
$this->add_render_attribute('team_name', 'class', 'team-member-name');

$team_position = $this->get_settings('team_designation');
$this->add_render_attribute('team_designation', 'class', 'team-member-position');

$team_info = $this->get_settings('team_info');
$this->add_render_attribute('team_info', 'class', 'team-member-info');

$fallback_defaults = [
    'fa fa-facebook',
    'fa fa-twitter',
    'fa fa-linkedin',
];

$migration_allowed = Icons_Manager::is_migration_allowed();

?>

<div class="easy-addons-team">
    <div class="team-wrapper <?php echo esc_attr($team_style) ?>">
        <div class="our-team">
            <div class="team-img">
                <img src="<?php echo esc_url($settings['team_image']['url']) ?>" alt="Image"/>
            </div>
            <div class="team-content">
                <?php if(!empty($team_name)):?>
                    <h3 class="team-name"><?php echo esc_html($team_name);?>
                        <small class="team-position">
                            <?php echo esc_html($team_position);?>
                        </small>
                    </h3>
                <?php endif;?>
            </div>
            <ul class="social-links">
                <?php
                foreach ($settings['social_icon_list'] as $index => $item) {
                    $migrated = isset($item['__fa4_migrated']['social_icon']);
                    $is_new = empty($item['social']) && $migration_allowed;
                    $social = '';

                    // add old default
                    if (empty($item['social']) && !$migration_allowed) {
                        $item['social'] = isset($fallback_defaults[$index]) ? $fallback_defaults[$index] : 'fa fa-wordpress';
                    }

                    if (!empty($item['social'])) {
                        $social = str_replace('fa fa-', '', $item['social']);
                    }

                    if (($is_new || $migrated) && 'svg' !== $item['social_icon']['library']) {
                        $social = explode(' ', $item['social_icon']['value'], 2);
                        if (empty($social[1])) {
                            $social = '';
                        } else {
                            $social = str_replace('fa-', '', $social[1]);
                        }
                    }
                    if ('svg' === $item['social_icon']['library']) {
                        $social = get_post_meta($item['social_icon']['value']['id'], '_wp_attachment_image_alt', true);
                    }

                    $link_key = 'link_' . $index;

                    $this->add_render_attribute($link_key, 'class', [
                        'team-icon',
                        'team-social-icon',
                        'team-repeater-item-' . $item['_id'],
                    ]);

                    $this->add_link_attributes($link_key, $item['link']);

                    ?>
                    <li><a <?php $this->print_render_attribute_string($link_key); ?>>
                            <span class="elementor-screen-only"><?php echo esc_html(ucwords($social)); ?></span>
                            <?php
                            if ($is_new || $migrated) {
                                Icons_Manager::render_icon($item['social_icon']);
                            } else { ?>
                                <i class="<?php echo esc_attr($item['social']); ?>"></i>
                            <?php } ?>
                        </a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>