<?php

namespace Easy_Addons\Widgets;

use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

/**
 * Elementor Image Gallery
 *
 * Elementor widget for Image Gallery show.
 *
 * @since 1.0.0
 */
class Counter_Up extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     *
     * @access public
     *
     */
    public function get_name()
    {
        return 'counter-up';
    }

    /**
     * Retrieve the widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     *
     * @access public
     *
     */
    public function get_title()
    {
        return __('Counter Up', 'easy-addons');
    }

    /**
     * Retrieve the widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     *
     * @access public
     *
     */
    public function get_icon()
    {
        return 'eicon-gallery-grid';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @return array Widget categories.
     * @since 1.0.0
     *
     * @access public
     *
     */
    public function get_categories()
    {
        return ['easy-addons'];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @return array Widget scripts dependencies.
     * @since 1.0.0
     *
     * @access public
     *
     */
    public function get_script_depends()
    {
        return ['counter-up', 'waypoints', 'counterUp'];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @return array Widget scripts dependencies.
     * @since 1.0.0
     *
     * @access public
     *
     */
    public function get_style_depends()
    {
        return ['counter-up'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Counter', 'easy-addons'),
            ]
        );


        $this->add_control(
            'counter-number',
            [
                'label' => esc_html__('Counter Number', 'easy-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 100
            ]
        );
        $this->add_control(
            'counter-icon',
            [
                'label'   => esc_html__( 'Icon', 'easy-addons' ),
                'type'    => Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );
        $this->add_control(
            'counter-desc',
            [
                'label' => esc_html__('Counter Number', 'easy-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Cups of coffee', 'easy-addons')
            ]
        );

        $this->add_control(
            'suffix',
            [
                'label' => esc_html__('Number Suffix', 'easy-addons'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => '',
                'placeholder' => esc_html__('Plus', 'easy-addons'),
            ]
        );

        $this->add_control(
            'counter-delay',
            [
                'label' => esc_html__('Counter Delay', 'easy-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,
                'min' => 10,
                'max' => 20,
                'step' => 5,
            ]
        );

        $this->add_control(
            'counter-duration',
            [
                'label' => esc_html__('Animation Duration', 'easy-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 2000,
                'min' => 100,
                'max' => 4000,
                'step' => 100,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Style', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'image_justified',
            [
                'label' => esc_html__('Justified Gallery Image', 'easy-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'justify',
                'options' => [
                    'justify' => esc_html__('Justify', 'easy-addons'),
                    'nojustify' => esc_html__('No Justify', 'easy-addons'),
                    'center' => esc_html__('Center', 'easy-addons'),
                    'right' => esc_html__('Right', 'easy-addons'),
                ],
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label' => esc_html__('Margin', 'easy-addons'),
                'type' => Controls_Manager::NUMBER,
                'min' => 5,
                'max' => 100,
                'step' => 2,
                'default' => 10,
            ]
        );
        $this->add_control(
            'image_caption_color',
            [
                'label' => esc_html__('Image Caption Text Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} h2.ea-image-gallery-caption' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'image_caption_typography',
                'selector' => '{{WRAPPER}} h2.ea-image-gallery-caption',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $counter_number = $settings['counter-number'];
        $counter_desc = $settings['counter-desc'];
        $counter_icon = $settings['counter-icon'];
        $suffix = $settings['suffix'];
        $counter_delay = $settings['counter-delay'];
        $counter_duration = $settings['counter-duration'];

        ?>

        <div class="easy-counter-up">
            <?php echo $this->get_id(); ?>
            <div class="counter-icon">
                <?php
                Icons_Manager::render_icon( $counter_icon, [ 'aria-hidden' => 'true' ] ); ?>
                <?php ?>
            </div>
            <?php if (!empty($counter_number)): ?>
                <p>
            <span class="counter"
                  data-delay="<?php echo esc_attr($counter_delay); ?>"
                  data-duration="<?php echo esc_attr($counter_duration); ?>"
                  id="counter">
                <?php echo esc_html($counter_number) ?>
            </span><?php if (!empty($suffix)): ?><span><?php echo esc_html($suffix) ?></span><?php endif; ?>
                </p>
            <?php endif; ?>
            <?php if (!empty($counter_desc)): ?>
                <p><?php echo esc_html($counter_desc) ?></p>
            <?php endif; ?>
        </div>

        <?php
    }

    /**
     * Render the widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 1.0.0
     *
     * @access protected
     */
//	protected function _content_template() {}
}
