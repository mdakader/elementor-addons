<?php

namespace Easy_Addons\Widgets;

use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/**
 * Elementor Image Gallery
 *
 * Elementor widget for Image Gallery show.
 *
 * @since 1.0.0
 */
class Image_Gallery extends Widget_Base {

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
		return 'image-gallery';
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
		return __( 'Image Gallery', 'easy-addons' );
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
		return [ 'image-gallery', 'justifiedGallery', 'venobox', 'isotope', 'images-loaded' ];
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
		return [ 'image-gallery', 'justifiedGallery', 'venobox' ];
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
				'label' => esc_html__( 'Image Gallery', 'easy-addons' ),
			]
		);

        $this->add_responsive_control(
            'columns', [
                'label' => esc_html__('Column', 'easy-addons' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    1 => esc_html__('1 Column', 'easy-addons' ),
                    2 => esc_html__('2 Column', 'easy-addons' ),
                    3 => esc_html__('3 Column', 'easy-addons' ),
                    4 => esc_html__('4 Column', 'easy-addons' ),
                    5 => esc_html__('5 Column', 'easy-addons' ),
                    6 => esc_html__('6 Column', 'easy-addons' ),
                ],
                'default' => 3,
                'selectors' => [
                    '{{WRAPPER}} .image-gallery-item' => '--image-grid-column: {{VALUE}};',
                ],
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'gallery_image',
            [
                'label' => esc_html__( 'Add Images', 'easy-addons' ),
                'type' => Controls_Manager::GALLERY,
                'default' => [],
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
			'image_justified',
			[
				'label'     =>esc_html__( 'Justified Gallery Image', 'easy-addons' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'justify',
				'options'   => [
					'justify'  => esc_html__( 'Justify', 'easy-addons' ),
					'nojustify'  => esc_html__( 'No Justify', 'easy-addons' ),
					'center' => esc_html__( 'Center', 'easy-addons' ),
					'right' => esc_html__( 'Right', 'easy-addons' ),
				],
			]
		);
		$this->add_responsive_control(
			'image_margin',
			[
				'label'      => esc_html__( 'Margin', 'easy-addons' ),
				'type'       => Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 100,
				'step' => 2,
				'default' => 10,
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

		$image_justified = $this->get_settings( 'image_justified' );
		$image_margin = $this->get_settings( 'image_margin' );

		?>

        <div class="easy-gallery">
            <div class="gallery-container" id="easy-gallery"
                 data-justify-image="<?php echo esc_attr($image_justified);?>"
                 data-margin="<?php echo esc_attr($image_margin);?>">
				<?php
				if (!empty($settings['gallery_image'])):
					foreach ($settings['gallery_image'] as $em_gallery_photo):
						?>
                        <a class="easy-image-gallery" data-gall="gallery01" href="<?php echo esc_url($em_gallery_photo['url']) ?>">
                            <img alt=""
                                 src="<?php echo esc_url($em_gallery_photo['url']) ?>"/>
                        </a>
					<?php endforeach; endif; ?>
            </div>
            <h1>Isotope - imagesLoaded progress</h1>
            <div class="gallery-grid">
                <div class="gallery-grid-sizer"></div>
                <div class="gallery-grid-item">
                    <?php
                    if (!empty($settings['gallery_image'])):
                        foreach ($settings['gallery_image'] as $em_gallery_photo):?>
                        <a class="easy-image-gallery image-gallery-item" data-gall="gallery01" href="<?php echo esc_url($em_gallery_photo['url']) ?>">
                            <img alt=""
                                 src="<?php echo esc_url($em_gallery_photo['url']) ?>"/>
                        </a>
                    <?php endforeach;
                    endif; ?>
                </div>
            </div>
        </div>

		<?php
	}
}
