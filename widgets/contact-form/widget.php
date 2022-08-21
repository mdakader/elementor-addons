<?php
namespace Easy_Addons\Widgets;

use Elementor\Widget_Base;


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
class CF7_Widget extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve  widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'cf7';
    }

    /**
     * Get widget title.
     *
     * Retrieve  widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Contact Form 7', 'plugin-name' );
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
     * Get widget categories.
     *
     * Retrieve the list of categories the  widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'easy-addons' ];
    }

    /**
     * Get all entry of contact form 7
     * @return array
     */
    public function get_contact_form_7_content(){
        $posts = get_posts(array(
            'post_type'     => 'wpcf7_contact_form'
        ));
        $contact7 = [];
        $contact7[0] = 'Please select a contact form';
        foreach($posts as $k => $post){
            $contact7[$post->ID] = __( $post->post_title, 'plugin-name' );
        }
        return $contact7;
    }

    /**
     * Register  widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'contact_form',
            [
                'label' => __( 'Contact Form', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 0,
                'options' => $this->get_contact_form_7_content()
            ]
        );

        $this->end_controls_section();


    }

    /**
     * Render  widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() { ?>
        <?php $settings = $this->get_settings_for_display(); ?>

        <div class="section-gap contact-request-area">
            <div class="container">
                <div class="section-heading">
                    <h3 class="title">We would love to hear from you.</h3>
                </div>
                <div class="contact-box-wrap">
                    <?php echo ($settings['contact_form'] > 0) ? do_shortcode('[contact-form-7 id="'. $settings['contact_form'].'"]') : '';?>
                </div>
            </div>
        </div>

    <?php }

}