<?php

use Elementor\Icons_Manager;

$team_style = $settings['team_style'];
$service_title = $this->get_settings('team_name');
$this->add_render_attribute('team_name', 'class', 'title');

$service_desc = $this->get_settings('team_designation');
$this->add_render_attribute('team_designation', 'class', 'post');

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
            <div class="team-content">
              <?php if (!empty($service_title)): ?>
                  <h3 <?php $this->print_render_attribute_string('team_name') ?>> <?php echo esc_html($service_title); ?></h3>
              <?php endif; ?>

              <?php if (!empty($service_desc)): ?>
                  <span <?php $this->print_render_attribute_string('team_designation') ?>> <?php echo esc_html($service_desc); ?></span>
              <?php endif; ?>
            </div>

        </div>
    </div>
</div>