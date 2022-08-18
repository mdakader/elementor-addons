<?php
namespace Easy_Addons\Widgets;
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
		return 'call-to-action';
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

		$ea_cta_desc = $this->get_settings( 'ea_cta_desc' );
		$this->add_render_attribute( 'ea_cta_desc', 'class', 'ea-cta-desc' );
		$this->add_inline_editing_attributes( 'ea_cta_desc' );

		$cta_link_text= $this->get_settings( 'cta_link_text' );
		$this->add_render_attribute( 'cta_link_text', 'class', 'ea-cta-link-text' );
		$this->add_inline_editing_attributes( 'cta_link_text' );
		?>
		<div class="ea-cta">
			<div class="ea-desc">
				<?php if(!empty($ea_cta_desc)):?>
					<p <?php  $this->print_render_attribute_string( 'ea_cta_desc' ) ?>> <?php echo esc_html( $ea_cta_desc ); ?></p>
				<?php endif;?>
			</div>
            <div class="ea-link">
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
