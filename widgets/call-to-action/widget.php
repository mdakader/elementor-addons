<?php
namespace Easy_Addons\Widgets;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/**
 * Elementor Call To Action
 *
 * Elementor widget for Call to action show.
 *
 * @since 1.0.0
 */
class Call_To_Action extends Widget_Base {

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
		return 'easy_cta';
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
		return __( 'Call To Action', 'easy-addons' );
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
		return 'eicon-call-to-action';
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
		return [ '' ];
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
		return [ 'call-to-action' ];
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
				'label' => esc_html__( 'Call To Action', 'easy-addons' ),
			]
		);

		$this->add_control(
			'ea_cta_desc',
			[
				'label' => esc_html__( 'Call To Action Text', 'easy-addons' ),
				'type'  => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Heading First Text Here', 'easy-addons' ),
				'default' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'easy-addons' ),
			]
		);

		$this->add_control(
			'cta_link',
			[
				'label' => esc_html__( 'Link', 'easy-addons' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'easy-addons' ),
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'cta_link_text',
			[
				'label' => esc_html__( 'Link Text', 'easy-addons' ),
				'type'  => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'CTA Link Text', 'easy-addons' ),
				'default' => esc_html__( 'Read More', 'easy-addons' ),
			]
		);
        $this->end_controls_section();


        $this->start_controls_section(
            'cta_style',
            [
                'label' => esc_html__('CTA Style', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'easy_cta_style', [
                'label' => __('CTA Style', 'easy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'cta-style-1' => esc_html__('CTA Style 1', 'easy-addons'),
                    'cta-style-2' => esc_html__('CTA Style 2', 'easy-addons'),
                ],
                'default' => 'cta-style-1',
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'cta_bg',
                'label' => esc_html__( 'Background', 'easy-addons'),
                'types' => [ 'classic', 'gradient'],
                'selector' =>'{{WRAPPER}} .easy-cta',
            ]
        );

        $this->add_responsive_control(
            'cta_padding',
            [
                'label' => esc_html__( 'Padding', 'easy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .easy-cta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'cta_align',
            [
                'label' => __( 'Alignment', 'elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'easy-addons' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'easy-addons' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'easy-addons' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justified', 'easy-addons' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .easy-cta.cta-style-2' => 'text-align: {{VALUE}};',
                ],
                'condition' => [
                    'easy_cta_style' => ['cta-style-2'],
                ]
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'cta_desc_style',
            [
                'label' => esc_html__('CTA Description', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'cta_desc_clr_text',
            [
                'label' => esc_html__('CTA Description Text Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} p.easy-cta-desc' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ct_desc_typography',
                'label' => esc_html__('CTA Description Typography', 'easy-addons'),
                'selector' => '{{WRAPPER}} p.easy-cta-desc',
            ]
        );
		$this->end_controls_section();


        $this->start_controls_section(
            'cta_btn_style',
            [
                'label' => esc_html__('CTA Button', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'cta_btn__tabs', [
                'label' => __('CTA Button', 'easy-addons'),
            ]
        );

        $this->start_controls_tab('cta_btn_normal', [
                'label' => __('Normal','easy-addons'),
            ]
        );
        $this->add_control(
            'cta_btn_text_clr',
            [
                'label' => esc_html__('Button Text Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} a.easy-cta-link-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'cta_btn_bg',
                'label' => esc_html__( 'CTA Button Background', 'easy-addons'),
                'types' => [ 'classic', 'gradient'],
                'selector' =>'{{WRAPPER}} a.easy-cta-link-text',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cta_btn_typography',
                'label' => esc_html__('CTA Button Text Typography', 'easy-addons'),
                'selector' => '{{WRAPPER}} a.easy-cta-link-text',
            ]
        );

        $this->add_responsive_control(
            'cta_btn_padding',
            [
                'label' => esc_html__( 'CTA Button Padding', 'easy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} a.easy-cta-link-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('cta_btn_hover', [
                'label' => __('Hover','easy-addons'),
            ]
        );
        $this->add_control(
            'cta_btn_text_h_clr',
            [
                'label' => esc_html__('Button Text Hover Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#111827',
                'selectors' => [
                    '{{WRAPPER}} a.easy-cta-link-text:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'cta_btn_h_bg',
                'label' => esc_html__( 'CTA Button Hover Background', 'easy-addons'),
                'types' => [ 'classic', 'gradient'],
                'selector' =>'{{WRAPPER}} a.easy-cta-link-text:before',
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

		$ea_cta_desc = $this->get_settings( 'ea_cta_desc' );
		$this->add_render_attribute( 'ea_cta_desc', 'class', 'easy-cta-desc' );
		$this->add_inline_editing_attributes( 'ea_cta_desc' );

		$cta_link_text= $this->get_settings( 'cta_link_text' );
		$this->add_render_attribute( 'cta_link_text', 'class', 'easy-cta-link-text' );
		$this->add_inline_editing_attributes( 'cta_link_text' );
		?>
		<div class="easy-cta <?php echo esc_attr($settings['easy_cta_style']);?>">
			<div class="easy-desc">
				<?php if(!empty($ea_cta_desc)):?>
					<p <?php  $this->print_render_attribute_string( 'ea_cta_desc' ) ?>> <?php echo esc_html( $ea_cta_desc ); ?></p>
				<?php endif;?>
			</div>
            <div class="easy-link">
                <?php
                if ( ! empty( $settings['cta_link']['url'] ) ) {
                $this->add_link_attributes( 'cta_link', $settings['cta_link'] );
                }
                ?>
                <a <?php  $this->print_render_attribute_string( 'cta_link' ); ?><?php $this->print_render_attribute_string( 'cta_link_text' ); ?>>
                   <?php echo esc_html($cta_link_text);?>
                </a>
			</div>
		</div>

		<?php
	}

}
