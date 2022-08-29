<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://profiles.wordpress.org/babuwpd/
 * @since             1.0.0
 * @package           Easy_Addons
 *
 * @wordpress-plugin
 * Plugin Name:       Easy Addons for Elementor
 * Plugin URI:        https://babuwp.com/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Babu WP
 * Author URI:        https://profiles.wordpress.org/babuwpd/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       easy-addons
 * Domain Path:       /languages
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
