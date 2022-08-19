<?php
namespace Easy_Addons;
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://profiles.wordpress.org/babuwpd/
 * @since      1.0.0
 *
 * @package    Easy_Addons
 * @subpackage Easy_Addons/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Easy_Addons
 * @subpackage Easy_Addons/public
 * @author     Babu WP <babuwpd@gmail.com>
 */
class Easy_Addons_Widget {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

        // Register widget scripts
        add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

        // Register widgets
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );

        // Register editor scripts
//        add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'editor_scripts' ] );

        //Register categories
        add_action( 'elementor/elements/categories_registered', [$this, 'add_elementor_widget_categories'], 101 );

	}
    public function widget_scripts() {
        wp_register_style( 'team', EASY_ADDONS_ASSETS . '/css/team.css');
        wp_register_style( 'flip-box', EASY_ADDONS_ASSETS . '/css/flip-box.css');
        wp_register_style( 'dual-heading', EASY_ADDONS_ASSETS . '/css/dual-heading.css');
        wp_register_style( 'call-to-action', EASY_ADDONS_ASSETS . '/css/call-to-action.css');
        wp_register_style( 'price', EASY_ADDONS_ASSETS . '/css/price.css');
        wp_register_style( 'image-gallery', EASY_ADDONS_ASSETS .'/css/image-gallery.css');
        wp_register_style( 'counter-up', EASY_ADDONS_ASSETS .'/css/counter-up.css');
        wp_register_style( 'testimonial', EASY_ADDONS_ASSETS .'/css/testimonial.css');

        wp_register_style( 'justifiedGallery', EASY_ADDONS_ASSETS .'/css/justifiedGallery.min.css');
        wp_register_style( 'venobox', EASY_ADDONS_ASSETS . '/css/venobox.css', );

        wp_register_script( 'justifiedGallery', EASY_ADDONS_ASSETS .'/js/jquery.justifiedGallery.js', [ 'jquery' ], false, true );
        wp_register_script( 'counter-up', EASY_ADDONS_ASSETS .'/js/jquery.counterup.min.js', [ 'jquery' ], false, true );
        wp_register_script( 'waypoints', EASY_ADDONS_ASSETS .'/js/waypoints.min.js', [ 'jquery' ], false, true );
        wp_register_script( 'counterUp', EASY_ADDONS_ASSETS .'/js/counter-up.js', [ 'jquery' ], false, true );
        wp_register_script( 'venobox', EASY_ADDONS_ASSETS .'/js/venobox.js', [ 'jquery' ], false, true );
        wp_register_script( 'image-gallery',EASY_ADDONS_ASSETS .'/js/image-gallery.js',  [ 'jquery' ], false, true );
        wp_register_script( 'testimonial',EASY_ADDONS_ASSETS .'/js/testimonial.js',  [ 'jquery' ], false, true );
    }
	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Easy_Addons_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Easy_Addons_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, EASY_ADDONS_ASSETS  . '/css/addons-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Easy_Addons_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Easy_Addons_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, EASY_ADDONS_ASSETS . '/js/easy-addons-public.js', array( 'jquery' ), $this->version, false );

	}

    /**
     * Include Widgets files
     *
     * Load widgets files
     *
     * @since 1.2.0
     * @access private
     */
    private function include_widgets_files() {

//        $widgets = [
//            'dual-heading',
//            'call-to-action',
//            'flip-box',
//            'counter',
//            'cf7',
//            'team',
//            'price',
//            'image-gallery',
//            'testimonial',
//
//        ];
//        foreach ($widgets as $widget) {
//            require_once(__DIR__ . '/' . $widget . '/widget.php');
//        }

        require_once(__DIR__ . '/price/widget.php');
        require_once( __DIR__ . '/dual-heading/widget.php');
        require_once( __DIR__ . '/team/widget.php');
        require_once( __DIR__ . '/flip-box/widget.php');
        require_once( __DIR__ . '/call-to-action/widget.php');
        require_once( __DIR__ . '/cf7/widget.php');
        require_once( __DIR__ . '/image-gallery/widget.php');
        require_once( __DIR__ . '/counter/widget.php');
        require_once( __DIR__ . '/testimonial/widget.php');
        require_once( __DIR__ . '/service/widget.php');
    }

    /**
     * Register Widgets
     *
     * Register new Elementor widgets.
     *
     * @since 1.2.0
     * @access public
     */
    public function register_widgets($widgets_manager) {
        // Its is now safe to include Widgets files
        $this->include_widgets_files();

        // Register Widgets
        $widgets_manager->register( new Widgets\Price());
        $widgets_manager->register( new Widgets\TeamWidget());
        $widgets_manager->register( new Widgets\Flip_Box());
        $widgets_manager->register( new Widgets\Dual_Heading());
        $widgets_manager->register( new Widgets\Call_To_Action());
        $widgets_manager->register( new Widgets\CF7());
        $widgets_manager->register( new Widgets\Image_Gallery());
        $widgets_manager->register( new Widgets\Counter_Up());
        $widgets_manager->register( new Widgets\Testimonial());
        $widgets_manager->register( new Widgets\Service_Widget());
    }


    //Register categories
    public function add_elementor_widget_categories( $elements_manager ) {

        $elements_manager->add_category(
            'easy-addons',
            [
                'title' => __( 'Easy Addons', 'easy-addons' ),
                'icon' => 'fa fa-plug',
            ]
        );
    }

}
