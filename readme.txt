=== Easy Digital Downloads - Changelog ===
Contributors: themesgrove
Tags: edd, edd-changelog, changelog
Requires at least: 4.9
Tested up to: 5.4
Stable tag: 0.1
Requires PHP: 5.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Display changelog for EDD download.

== Description ==

Display changelog for EDD download.

== Installation ==

-   Upload the plugin files to the `/wp-content/plugins/simple-edd-changelog` directory, or install the plugin through the WordPress plugins screen directly.
-   Activate the plugin through the 'Plugins' screen in WordPress.
-   Use the shortcode `[edd_changelog id="1"]` or `<?php echo do_shortcode('[edd_changelog id="1"]'); ?>` to display the changlog. _N.B: You must have to put your download item id._

= How to use =

-   To display the changelog from an specific download use the shortcode `[edd_changelog id="{download_id}"]`.
-   If you wish to change the product title, use the title attribute inside the shortcode. e.g. `[edd_changelog id="1" title="Very Simple Product Changelog"]`.

== Changelog ==

= 0.1 =

-   Initial release.
