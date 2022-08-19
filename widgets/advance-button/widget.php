<?php

namespace Easy_Addons\Widgets;

use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/**
 * Elementor Dual Heading
 *
 * Elementor widget for Dual Heading show.
 *
 * @since 1.0.0
 */
class Advance_Button_Widget extends Widget_Base {

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
		return 'advance-button';
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
		return __( 'Advance Button', 'easy-addons' );
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
		return ' eicon-heading';
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
		return [ 'dual-heading' ];
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
	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Dual Header', 'easy-addons' ),
			]
		);

		$this->add_control(
			'first_title',
			[
				'label' => esc_html__( 'First Title', 'easy-addons' ),
				'type'  => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Heading First Text Here', 'easy-addons' ),
				'default' => esc_html__( 'Heading First Text Here', 'easy-addons' ),
			]
		);

		$this->add_control(
			'last_title',
			[
				'label' => esc_html__( 'Last Title', 'easy-addons' ),
				'type'  => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Heading Last Text Here', 'easy-addons' ),
				'default' => esc_html__( 'Heading Last Text Here', 'easy-addons' ),
			]
		);

		$this->add_responsive_control(
			'align',
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
					'{{WRAPPER}} .ea-title' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'easy-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label'     =>esc_html__( 'Text Transform', 'easy-addons' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => [
					''           => esc_html__( 'None', 'easy-addons' ),
					'uppercase'  => esc_html__( 'UPPERCASE', 'easy-addons' ),
					'lowercase'  => esc_html__( 'lowercase', 'easy-addons' ),
					'capitalize' => esc_html__( 'Capitalize', 'easy-addons' ),
				],
				'selectors' => [
					'{{WRAPPER}} .ea-title' => 'text-transform: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'first_title_color',
			[
				'label' => esc_html__( 'First Title Color', 'easy-addons' ),
				'type' => Controls_Manager::COLOR,
				'alpha' => true,
				'default'=> '#e74c3c',
				'selectors' => [
					'{{WRAPPER}} .ea-first-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'last_title_color',
			[
				'label' => esc_html__( 'Last Title Color', 'easy-addons' ),
				'type' => Controls_Manager::COLOR,
				'alpha' => true,
				'default'=> '#2ecc71',
				'selectors' => [
					'{{WRAPPER}} .ea-last-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'dual_title_typography',
				'selector' => '{{WRAPPER}} .ea-title',
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
	protected function render() {
		$settings = $this->get_settings_for_display();

		$first_title = $this->get_settings( 'first_title' );
		$this->add_render_attribute( 'first_title', 'class', 'ea-first-title' );
		$this->add_inline_editing_attributes( 'first_title' );

		$last_title = $this->get_settings( 'last_title' );
		$this->add_render_attribute( 'last_title', 'class', 'ea-last-title' );
		$this->add_inline_editing_attributes( 'last_title' );
		?>
            <div class="ea-dual-header">
                <h2 class="ea-title">
	                <?php if(!empty($first_title)):?>
                    <span <?php  $this->print_render_attribute_string( 'first_title' ) ?>> <?php echo esc_html( $first_title ); ?></span>
                    <?php endif;?>
                    <?php if(!empty($last_title)):?>
                    <span <?php  $this->print_render_attribute_string( 'last_title' ) ?>> <?php echo esc_html( $last_title ); ?></span>
                    <?php endif;?>
                </h2>
            </div>

		<?php
	}

}
