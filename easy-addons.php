<?php
/**
 * Plugin Name: Easy Addons for Elementor
 * Description: Easy Addons For Elementor is a plugin for widgets to extend for Elementor Page Builder.
 * Plugin URI: https://babuwp.com/wp/easy-addons/
 * Version:           1.1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author: Babu WP
 * Author URI: https://profiles.wordpress.org/babuwpd/
 * Text Domain: easy-addons
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * Elementor tested up to:     3.7.4
 * Elementor Pro tested up to: 3.7.4
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'EASY_ADDONS_VERSION', '1.0.0' );
define( 'EASY_ADDONS_FILE', __FILE__ );
define( 'EASY_ADDONS_PATH', __DIR__ );
define( 'EASY_ADDONS_URL', plugins_url( '', EASY_ADDONS_FILE ) );
define( 'EASY_ADDONS_ASSETS', EASY_ADDONS_URL . '/assets' );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-easy-addons-activator.php
 */
function activate_easy_addons() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/classes/class-easy-addons-activator.php';
	Easy_Addons_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-easy-addons-deactivator.php
 */
function deactivate_easy_addons() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/classes/class-easy-addons-deactivator.php';
	Easy_Addons_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_easy_addons' );
register_deactivation_hook( __FILE__, 'deactivate_easy_addons' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/classes/class-easy-addons.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_easy_addons() {

	$plugin = new Easy_Addons();
	$plugin->run();

}
run_easy_addons();
