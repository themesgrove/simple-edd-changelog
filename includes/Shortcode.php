<?php

namespace ThemesGrove\EDDChangelog;

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

final class Shortcode
{
    /**
     * The single instance of this class
     */
    private static $instance = null;

    /**
     * Construct Shortcode class.
     *
     * @since 0.1
     * @access public
     */
    private function __construct()
    {
        add_shortcode('edd_changelog', [$this, 'changelog_shortcode']);
    }

    /**
     * Main Shortcode Instance.
     *
     * Ensures that only one instance of Shortcode exists in memory at any one
     * time. Also prevents needing to define globals all over the place.
     *
     * @since 0.1
     * @return object|Shortcode The one true Shortcode
     * @access public
     */
    public static function instance()
    {
        if (!isset(self::$instance) && !(self::$instance instanceof Shortcode)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * The [edd_changelog] shortcode.
     *
     * @access public
     * @since 1.0
     * @return string
     */
    public static function changelog_shortcode($atts)
    {
        if (!isset($atts['id'])) {
            return;
        }

        $changelog = get_post_meta($atts['id'], '_edd_sl_changelog', TRUE);

        //  Sanitize the HTML from the change log field data.
        $changelog = balanceTags(wp_kses_post($changelog), TRUE);

        if (!empty($changelog)) {
            $html = sprintf(
                '<div class="edd-changelog"><h2>%1$s</h2>%2$s</div>',
                $atts['title'] ?? 'Changelog',
                $changelog
            );
        }

        return $html;
    }
}