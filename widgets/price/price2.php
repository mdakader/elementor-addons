<?php
/**
 * Elementor Custom Price Widget for .
 */
namespace Elementor;

if (!defined('ABSPATH'))
    die('No script kiding please');

class Elementor_Price_widget extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve Price widget name.
     * @access public
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'Price';
    }

    /**
     * Get widget title.
     * Retrieve Price widget title.
     * @access public
     * @return string Widget title.
     */
    public function get_title()
    {
        return __( 'Price', 'plugin_name' );
    }

    /**
     * Get widget icon.
     * Retrieve Price widget icon.
     * @access public
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-price-table';
    }

    /**
     * Get widget categories.
     * Retrieve the list of categories the Price widget belongs to.
     * @access public
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return [ 'Text-by-thea' ];
    }

    /**
     * Register Price widget controls.
     * Adds different input fields to allow the user to change and customize the widget settings.
     * @access protected
     */
    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Head Content', 'plugin_name' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'header_image',
            [
                'label' => __( 'Image', 'plugin_name' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' =>  GLOBAL_PATH.'/assets/images/section-header-img/Price.png',
                ]
            ]
        );
        $this->add_control(
            'top-title',
            [
                'label' => __( 'Headline Title', 'plugin_name' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter headline title', 'plugin_name' ),
                'default' => 'Text Price Plan'
            ]
        );
        $this->add_control(
            'field-one',
            [
                'label' => __( 'First Field Text', 'plugin_name' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter first field text', 'plugin_name' ),
                'default' => 'We bring Swedish relaxation Text, remedial Text, deep tissue'
            ]
        );
        $this->add_control(
            'field-two',
            [
                'label' => __( 'Second Field Text', 'plugin_name' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter second field text', 'plugin_name' ),
                'default' => 'Text and corporate chair Text to you.'
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'content_section_second',
            [
                'label' => __( 'Content', 'plugin_name' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'bd_color',
            [
                'label' => __( 'Background Color', 'plugin_name' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'bg-orange border-orange'  => __( 'Orange', 'plugin_name' ),
                    'bg-purple border-purple'  => __( 'Purple', 'plugin_name' ),
                    'bg-success-lighter border-success-lighter'  => __( 'Green', 'plugin_name' ),
                    'bg-blue border-blue'  => __( 'Blue', 'plugin_name' )
                ],
            ]
        );
        $repeater->add_control(
            'fa_icon',
            [
                'label' => __( 'Image', 'plugin_name' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label' => __( 'Title', 'plugin_name' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter title', 'plugin_name' ),
            ]
        );
        $repeater->add_control(
            'title_1',
            [
                'label' => __( 'Second Title', 'plugin_name' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter second title', 'plugin_name' ),
            ]
        );
        $repeater->add_control(
            'connecting_slug',
            [
                'label' => __( 'Connecting Slug', 'plugin_name' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter Connecting Slug', 'plugin_name' ),
            ]
        );
        $repeater->add_control(
            'price_text_color',
            [
                'label' => __( 'Price Text Color', 'plugin_name' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'color-orange'  => __( 'Orange', 'plugin_name' ),
                    'color-purple'  => __( 'Purple', 'plugin_name' ),
                    'color-success'  => __( 'Green', 'plugin_name' ),
                    'color-blue'  => __( 'Blue', 'plugin_name' )
                ],
            ]
        );

        $this->add_control(
            'Price',
            [
                'label' => __( 'Pricing Two Grid', 'plugin_name' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}} - {{{ connecting_slug }}}',
                'default' => [
                    [
                        'fa_icon' => Array( 'url' => GLOBAL_PATH.'/assets/images/pricing-plan/sweedish.svg'),
                        'title' => 'Title One',
                        'title_1' => 'Text',
                        'bd_color' => 'bg-orange border-orange',
                        'price_text_color' => 'color-orange',
                        'connecting_slug' => 'block1',
                    ],
                    [
                        'fa_icon' => Array( 'url' => GLOBAL_PATH.'/assets/images/pricing-plan/mobile-spa-message.svg'),
                        'title' => 'Title Two',
                        'title_1' => 'Text',
                        'bd_color' => 'bg-purple border-purple',
                        'price_text_color' => 'color-purple',
                        'connecting_slug' => 'block2'
                    ],
                    [
                        'fa_icon' => Array( 'url' => GLOBAL_PATH.'/assets/images/pricing-plan/deep-tissue.svg'),
                        'title' => 'Title Three',
                        'title_1' => 'Text',
                        'bd_color' => 'bg-success-lighter border-success-lighter',
                        'price_text_color' => 'color-success',
                        'connecting_slug' => 'block3'
                    ],
                    [
                        'fa_icon' => Array( 'url' => GLOBAL_PATH.'/assets/images/pricing-plan/bamboo.svg'),
                        'title' => 'Title Four',
                        'title_1' => 'Text',
                        'bd_color' => 'bg-blue border-blue',
                        'price_text_color' => 'color-blue',
                        'connecting_slug' => 'block4'
                    ],
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section_third',
            [
                'label' => __( 'Inner Price Content', 'plugin_name' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $price_repeater = new Repeater();

        $price_repeater->add_control(
            'price_text',
            [
                'label' => __( 'Price Text', 'plugin_name' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter price text', 'plugin_name' ),
            ]
        );
        $price_repeater->add_control(
            'connecting_slug',
            [
                'label' => __( 'Connecting Slug', 'plugin_name' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter Connecting Slug', 'plugin_name' ),
            ]
        );
        $this->add_control(
            'Price_text_repeater',
            [
                'label' => __( 'Inner Price Text Repeater', 'plugin_name' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $price_repeater->get_controls(),
                'title_field' => '{{{ price_text }}} - {{{ connecting_slug }}}',
                'default' => [
                    [

                        'price_text' => '60 minute: $60',
                        'connecting_slug' => 'block1'

                    ],
                    [

                        'price_text' => '60 minute: $60',
                        'connecting_slug' => 'block2'

                    ],
                    [

                        'price_text' => '0 minute: $90',
                        'connecting_slug' => 'block2'

                    ],
                    [

                        'price_text' => '60 minute: $60',
                        'connecting_slug' => 'block3'

                    ],
                    [

                        'price_text' => '0 minute: $90',
                        'connecting_slug' => 'block3'

                    ],
                    [

                        'price_text' => '60 minute: $60',
                        'connecting_slug' => 'block4'

                    ],
                    [

                        'price_text' => '0 minute: $90',
                        'connecting_slug' => 'block4'

                    ],

                ]
            ]
        );

        $this->end_controls_section();


    }

    /**
     * Render Price widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="wrapper" id="pricing">
            <div class="container">
                <div class="section-header text-center pb-20">
                    <h2><img src="<?=$settings['header_image']['url']?>" alt="service-header-image" class="img-fluid "><?=$settings['top-title']?></h2>
                    <p class="aw-b2"><?=$settings['field-one']?> <br> <?=$settings['field-two']?></p>
                </div>
                <div class="row">
                    <?php if ( $settings['Price'] ): ?>
                        <?php foreach (  $settings['Price'] as $item ):?>
                            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                                <div class="single-pricing-plan <?=$item['bd_color']?> radius-6">
                                    <div class="pricing-header">
                                        <img src="<?=$item['fa_icon']['url']?>" alt="pricing-icon" class="img-fluid mb-05">
                                        <h3><?=$item['title']?> <br> <?=$item['title_1']?></h3>

                                        <?php if ( $settings['Price_text_repeater'] ): ?>
                                            <ul class="custom-list custom-service-list">
                                                <?php foreach (  $settings['Price_text_repeater'] as $price ):?>
                                                    <?php if ($item['connecting_slug'] === $price['connecting_slug'] ){ ?>
                                                        <li class="<?=$item['price_text_color']?>"><?=$price['price_text']?></li>
                                                    <?php } ?>
                                                <?php endforeach;?>
                                            </ul>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
            </div>
        </div>

        <?php

    }

}