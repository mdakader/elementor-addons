<?php

namespace Easy_Addons\Widgets;

use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

/**
 * Elementor Flip box
 *
 * Elementor widget for Flip box show.
 *
 * @since 1.0.0
 */
class Flip_Box extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     *
     * @access public
     *
     */
    public function get_name() {
        return 'easy_flip_box';
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
    public function get_title() {
        return __( 'Flip Box', 'easy-addons' );
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
    public function get_icon() {
        return 'eicon-flip-box';
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
    public function get_categories() {
        return [ 'easy-addons' ];
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
    public function get_script_depends() {
        return [ 'easy-addons' ];
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
    public function get_style_depends() {
        return [ 'flip-box' ];
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
    protected Function register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Flip Box', 'easy-addons' ),
            ]
        );
        $this->add_control(
            'image',
            [
                'label'   => esc_html__( 'Choose Image', 'easy-addons' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'flip_box_title',
            [
                'label'       => esc_html__( 'Flip Box Title', 'easy-addons' ),
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__( 'Enter Flip Box Title Text Here', 'easy-addons' ),
                'default'     => esc_html__( 'Heading Text Here', 'easy-addons' ),
            ]
        );

        $this->add_control(
            'flip_box_desc',
            [
                'label'       => esc_html__( 'Description Text Here', 'easy-addons' ),
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__( 'Description Text Here', 'easy-addons' ),
                'default'     => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', 'easy-addons' ),
            ]
        );
        $this->add_control(
            'flip_box_link',
            [
                'label'       => esc_html__( 'Link', 'easy-addons' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'easy-addons' ),
                'default'     => [
                    'url'               => '#',
                    'is_external'       => true,
                    'nofollow'          => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'flip_box_link_text',
            [
                'label'       => esc_html__( 'Link Text', 'easy-addons' ),
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__( 'CTA Link Text', 'easy-addons' ),
                'default'     => esc_html__( 'Read More', 'easy-addons' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__( 'Flip Box', 'easy-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'flip_box_card_height',
            [
                'label'      => esc_html__( 'Flip Box Height', 'easy-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [
                    'px' => [
                        'min'  => 200,
                        'max'  => 1000,
                        'step' => 5,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => 380,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .flip-box-card' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'flip_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'easy-addons' ),
                'selector' => '{{WRAPPER}} .your-class',
            ]
        );
        $this->add_responsive_control(
            'padding',
            [
                'label' => esc_html__( 'Padding', 'easy-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .inner-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__( 'Border', 'easy-addons' ),
                'selector' => '{{WRAPPER}} .inner-content',
            ]
        );
        $this->add_responsive_control(
            'align',
            [
                'label'     => __( 'Alignment', 'elementor' ),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'    => [
                        'title' => esc_html__( 'Left', 'easy-addons' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center'  => [
                        'title' => esc_html__( 'Center', 'easy-addons' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'   => [
                        'title' => esc_html__( 'Right', 'easy-addons' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justified', 'easy-addons' ),
                        'icon'  => 'eicon-text-align-justify',
                    ],
                ],
                'default'   => 'center',
                'selectors' => [
                    '{{WRAPPER}} .flip-box-content .inner-content' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'flip_back_style',
            [
                'label' => esc_html__( 'Flip Box Back', 'easy-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'flip_box_title_color',
            [
                'label'     => esc_html__( 'Title Color', 'easy-addons' ),
                'type'      => Controls_Manager::COLOR,
                'alpha'     => true,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .easy-flip-box-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'flip_box_title_typography',
                'label'     => esc_html__( 'Title Typography', 'easy-addons' ),
                'selector' => '{{WRAPPER}} .easy-flip-box-title',
            ]
        );
        $this->add_control(
            'flip_box_desc_color',
            [
                'label'     => esc_html__( 'Description Color', 'easy-addons' ),
                'type'      => Controls_Manager::COLOR,
                'alpha'     => true,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .easy-flip-box-desc' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'flip_box_desc_typography',
                'label'     => esc_html__( 'Description Typography', 'easy-addons' ),
                'selector' => '{{WRAPPER}} .easy-flip-box-desc',
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'flip_box_btn_style',
            [
                'label' => esc_html__('Flip Box Button', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'flip_box_btn__tabs', [
                'label' => __('Flip Box Button', 'easy-addons'),
            ]
        );

        $this->start_controls_tab('flip_box_btn_normal', [
                'label' => __('Normal','easy-addons'),
            ]
        );

        $this->add_control(
            'flip_box_link_color',
            [
                'label'     => esc_html__( 'Button Text Color', 'easy-addons' ),
                'type'      => Controls_Manager::COLOR,
                'alpha'     => true,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .easy-flip-box-link' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'flip_box_link_typography',
                'label'     => esc_html__( 'Button Text Typography', 'easy-addons' ),
                'selector' => '{{WRAPPER}} .easy-flip-box-link',
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'flip_box_btn_bg',
                'label' => esc_html__( 'Button Background', 'easy-addons'),
                'types' => [ 'classic', 'gradient'],
                'selector' =>'{{WRAPPER}} a.easy-cta-link-text',
            ]
        );

        $this->add_responsive_control(
            'flip_box_btn_padding',
            [
                'label' => esc_html__( 'Button Padding', 'easy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} a.easy-cta-link-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'flip_btn_border',
                'label' => esc_html__( 'Border', 'easy-addons' ),
                'selector' => '{{WRAPPER}} .inner-content a',
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab('flip_box_btn_hover', [
                'label' => __('Hover','easy-addons'),
            ]
        );
        $this->add_control(
            'flip_box_link_color_h',
            [
                'label'     => esc_html__( 'Button Text Hover Color', 'easy-addons' ),
                'type'      => Controls_Manager::COLOR,
                'alpha'     => true,
                'default'   => '#0F172A',
                'selectors' => [
                    '{{WRAPPER}} .inner-content a.easy-flip-box-link:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'flip_box_btn_h_bg',
                'label' => esc_html__( 'Button Hover Background Color', 'easy-addons'),
                'types' => [ 'classic', 'gradient'],
                'selector' =>'{{WRAPPER}} .inner-content a.easy-flip-box-link:before',
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

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
    protected function render() {
        $settings = $this->get_settings_for_display();

        $flip_box_title = $this->get_settings( 'flip_box_title' );
        $this->add_render_attribute( 'flip_box_title', 'class', 'easy-flip-box-title' );
        $this->add_inline_editing_attributes( 'flip_box_title' );

        $flip_box_desc = $this->get_settings( 'flip_box_desc' );
        $this->add_render_attribute( 'flip_box_desc', 'class', 'easy-flip-box-desc' );
        $this->add_inline_editing_attributes( 'flip_box_desc' );

        $flip_box_link_text = $this->get_settings( 'flip_box_link_text' );
        $this->add_render_attribute( 'flip_box_link_text', 'class', 'easy-flip-box-link' );
        $this->add_inline_editing_attributes( 'flip_box_link_text' );
        ?>
        <div class="easy-flip-box">
            <div class="flip-box-card">
                <div class="flip-box-content">
                    <div class="flip-box-front">
                        <img src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="Front Image">
                    </div>
                    <div class="flip-box-back">
                        <div class="inner-content">
                            <?php if ( ! empty( $flip_box_title ) ): ?>
                                <h2 <?php  $this->print_render_attribute_string( 'flip_box_title' ); ?>><?php echo esc_html( $flip_box_title ); ?></h2>
                            <?php endif; ?>
                            <?php if ( ! empty( $flip_box_title ) ): ?>
                                <p <?php  $this->print_render_attribute_string( 'flip_box_desc' ); ?>><?php echo esc_html( $flip_box_desc ); ?></p>
                            <?php endif; ?>
                            <?php
                            if ( ! empty( $settings['flip_box_link']['url'] ) ) {
                                $this->add_link_attributes( 'flip_box_link', $settings['flip_box_link'] );
                            }
                            ?>
                            <a <?php  $this->print_render_attribute_string( 'flip_box_link' ); ?><?php $this->print_render_attribute_string( 'flip_box_link_text' ); ?>>
                                <?php echo esc_html( $flip_box_link_text ); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
}
