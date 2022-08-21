<?php
namespace Easy_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Widget_Base;

/**
 * Elementor star rating widget.
 *
 * Elementor widget that displays star rating.
 *
 * @since 2.3.0
 */
class Widget_Star_Rating extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve star rating widget name.
     *
     * @since 2.3.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'star-rating';
    }

    /**
     * Get widget title.
     *
     * Retrieve star rating widget title.
     *
     * @since 2.3.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Star Rating', 'easy-addons' );
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
     * Get widget icon.
     *
     * Retrieve star rating widget icon.
     *
     * @since 2.3.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-rating';
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the widget belongs to.
     *
     * @since 2.3.0
     * @access public
     *
     * @return array Widget keywords.
     */
    public function get_keywords() {
        return [ 'star', 'rating', 'rate', 'review' ];
    }

    /**
     * Register star rating widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
            'section_rating',
            [
                'label' => esc_html__( 'Rating', 'easy-addons' ),
            ]
        );

        $this->add_control(
            'rating_scale',
            [
                'label' => esc_html__( 'Rating Scale', 'easy-addons' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '5' => '0-5',
                    '10' => '0-10',
                ],
                'default' => '5',
            ]
        );

        $this->add_control(
            'rating',
            [
                'label' => esc_html__( 'Rating', 'easy-addons' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 10,
                'step' => 0.1,
                'default' => 5,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'star_style',
            [
                'label' => esc_html__( 'Icon', 'easy-addons' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'star_fontawesome' => 'Font Awesome',
                    'star_unicode' => 'Unicode',
                ],
                'default' => 'star_fontawesome',
                'render_type' => 'template',
                'prefix_class' => 'elementor--star-style-',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'unmarked_star_style',
            [
                'label' => esc_html__( 'Unmarked Style', 'easy-addons' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'solid' => [
                        'title' => esc_html__( 'Solid', 'easy-addons' ),
                        'icon' => 'eicon-star',
                    ],
                    'outline' => [
                        'title' => esc_html__( 'Outline', 'easy-addons' ),
                        'icon' => 'eicon-star-o',
                    ],
                ],
                'default' => 'solid',
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'easy-addons' ),
                'type' => Controls_Manager::TEXT,
                'separator' => 'before',
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__( 'Alignment', 'easy-addons' ),
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
                'prefix_class' => 'elementor-star-rating%s--align-',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__( 'Title', 'easy-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'title!' => '',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Text Color', 'easy-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-star-rating__title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .elementor-star-rating__title',
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_shadow',
                'selector' => '{{WRAPPER}} .elementor-star-rating__title',
            ]
        );

        $this->add_responsive_control(
            'title_gap',
            [
                'label' => esc_html__( 'Gap', 'easy-addons' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    'body:not(.rtl) {{WRAPPER}}:not(.elementor-star-rating--align-justify) .elementor-star-rating__title' => 'margin-right: {{SIZE}}{{UNIT}}',
                    'body.rtl {{WRAPPER}}:not(.elementor-star-rating--align-justify) .elementor-star-rating__title' => 'margin-left: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_stars_style',
            [
                'label' => esc_html__( 'Stars', 'easy-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => esc_html__( 'Size', 'easy-addons' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-star-rating' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_space',
            [
                'label' => esc_html__( 'Spacing', 'easy-addons' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    'body:not(.rtl) {{WRAPPER}} .elementor-star-rating i:not(:last-of-type)' => 'margin-right: {{SIZE}}{{UNIT}}',
                    'body.rtl {{WRAPPER}} .elementor-star-rating i:not(:last-of-type)' => 'margin-left: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'stars_color',
            [
                'label' => esc_html__( 'Color', 'easy-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-star-rating i:before' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'stars_unmarked_color',
            [
                'label' => esc_html__( 'Unmarked Color', 'easy-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-star-rating i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * @since 2.3.0
     * @access protected
     */
    protected function get_rating() {
        $settings = $this->get_settings_for_display();
        $rating_scale = (int) $settings['rating_scale'];
        $rating = (float) $settings['rating'] > $rating_scale ? $rating_scale : $settings['rating'];

        return [ $rating, $rating_scale ];
    }

    /**
     * Print the actual stars and calculate their filling.
     *
     * Rating type is float to allow stars-count to be a fraction.
     * Floored-rating type is int, to represent the rounded-down stars count.
     * In the `for` loop, the index type is float to allow comparing with the rating value.
     *
     * @since 2.3.0
     * @access protected
     */
    protected function render_stars( $icon ) {
        $rating_data = $this->get_rating();
        $rating = (float) $rating_data[0];
        $floored_rating = floor( $rating );
        $stars_html = '';

        for ( $stars = 1.0; $stars <= $rating_data[1]; $stars++ ) {
            if ( $stars <= $floored_rating ) {
                $stars_html .= '<i class="elementor-star-full">' . $icon . '</i>';
            } elseif ( $floored_rating + 1 === $stars && $rating !== $floored_rating ) {
                $stars_html .= '<i class="elementor-star-' . ( $rating - $floored_rating ) * 10 . '">' . $icon . '</i>';
            } else {
                $stars_html .= '<i class="elementor-star-empty">' . $icon . '</i>';
            }
        }

        return $stars_html;
    }

    /**
     * @since 2.3.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $rating_data = $this->get_rating();
        $textual_rating = $rating_data[0] . '/' . $rating_data[1];
        $icon = '&#xE934;';

        if ( 'star_fontawesome' === $settings['star_style'] ) {
            if ( 'outline' === $settings['unmarked_star_style'] ) {
                $icon = '&#xE933;';
            }
        } elseif ( 'star_unicode' === $settings['star_style'] ) {
            $icon = '&#9733;';

            if ( 'outline' === $settings['unmarked_star_style'] ) {
                $icon = '&#9734;';
            }
        }

        $this->add_render_attribute( 'icon_wrapper', [
            'class' => 'elementor-star-rating',
            'title' => $textual_rating,
            'itemtype' => 'http://schema.org/Rating',
            'itemscope' => '',
            'itemprop' => 'reviewRating',
        ] );

        $schema_rating = '<span itemprop="ratingValue" class="elementor-screen-only">' . $textual_rating . '</span>';
        $stars_element = '<div ' . $this->get_render_attribute_string( 'icon_wrapper' ) . '>' . $this->render_stars( $icon ) . ' ' . $schema_rating . '</div>';
        ?>

        <div class="elementor-star-rating__wrapper">
            <?php if ( ! Utils::is_empty( $settings['title'] ) ) : ?>
                <div class="elementor-star-rating__title"><?php echo esc_html( $settings['title'] ); ?></div>
            <?php endif;
            // PHPCS - $stars_element contains an HTML string that cannot be escaped. ?>
            <?php echo $stars_element; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </div>
        <?php
    }
}
