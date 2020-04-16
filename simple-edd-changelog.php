<?php

/**
 * Easy Digital Downloads - Changelog
 *
 * Plugin Name: Easy Digital Downloads - Changelog
 * Plugin URI:  https://themesgrove.com/
 * Description: Display changlog for EDD download.
 * Tags:        edd, edd-changelog, changelog
 * Version:     0.1
 * Author:      ThemesGrove
 * Author URI:  https://themesgrove.com/
 * Text Domain: simple-edd-changelog
 *
 * Requires PHP: 5.6
 * Requires at least: 4.9
 * Tested up to: 5.4
 */

namespace ThemesGrove\EDDChangelog;

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

// Includes vendor files.
require_once __DIR__ . '/vendor/autoload.php';

final class EDDChangelog
{
    /**
     * The single instance of this class
     */
    private static $instance = null;

    /**
     * Construct EDDChangelog class.
     *
     * @since 0.1
     * @access private
     */
    private function __construct()
    {
        // Define constants.
        $this->define_constants();

        // Initialize actions.
        $this->init_actions();
    }

    /**
     * Main EDDChangelog Instance.
     *
     * Ensures that only one instance of EDDChangelog exists in memory at any one
     * time. Also prevents needing to define globals all over the place.
     *
     * @since 0.1
     * @return object | \EDDChangelog
     * @access public
     */
    public static function instance()
    {
        if (!isset(self::$instance) && !(self::$instance instanceof EDDChangelog)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Define the necessary constants.
     *
     * @since 0.1
     * @access private
     * @return void
     */
    private function define_constants()
    {
        // Set plugin version.
        if (!defined('SIMPLE_EDD_CHANGELOG_VERSION')) {
            define('SIMPLE_EDD_CHANGELOG_VERSION', '0.1');
        }
    }

    /**
     * Initialize actions.
     *
     * @since 0.1
     * @access private
     * @return void
     */
    private function init_actions()
    {
        register_activation_hook(__FILE__, [$this, 'activate']);

        // Load shortcode
        shortcode();
    }

    /**
     * Activate plugin.
     *
     * @since 0.1
     * @access public
     * @return void
     */
    public function activate()
    {
        $installed = get_option('simple_edd_changelog_installed');
        if (!$installed) {
            update_option('simple_edd_changelog_installed', time());
        }

        update_option('simple_edd_changelog_version', SIMPLE_EDD_CHANGELOG_VERSION);
    }

    /**
     * Cloning is forbidden.
     *
     * This method protect the class to cloneing instance.
     *
     * @since 0.1
     * @access public
     */
    public function __clone()
    {
        _doing_it_wrong(__FUNCTION__, __('Cloning is forbidden!', 'simple-edd-changelog'), '0.1');
    }

    /**
     * Unserialize instances of this class is forbidden.
     *
     * This method protect the class to create unserialize instances.
     *
     * @since 0.1
     * @access public
     */
    public function __wakeup()
    {
        _doing_it_wrong(__FUNCTION__, __('Unserialize instances is forbidden!', 'simple-edd-changelog'), '0.1');
    }
}

// Load main class
EDDChangelog::instance();
