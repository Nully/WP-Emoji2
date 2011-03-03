<?php
/*
Plugin Name: WP Emoji2
Plugin URI:
Description: KtaiStyleプラグインと合わせて使える絵文字プラグインです。ショートコードを提供し、絵文字変換を行うことが出来ます。また、KtaiStyleプラグインがない場合でも、絵文字を画像タグで挿入することが出来ます。
Author: Nully
Version: 0.2
Author URI: http://blog.nully.org/
*/
/**
 * @WP_EMOJI2_BASE_DIR
 */
define("WP_EMOJI2_BASE_DIR", plugin_dir_path(__FILE__));
/**
 * @WP_EMOJI2_BASE_URL
 */
define("WP_EMOJI2_BASE_URL", plugin_dir_url(__FILE__));
/**
 * @WP_EMOJI2_IMG_URL
 */
define("WP_EMOJI2_IMG_URL", WP_EMOJI2_BASE_URL. "images/");


/**
 * Load scripts
 */
require_once WP_EMOJI2_BASE_DIR. "wp-emoji2-util.php";


/**
 * initialize WP Emoji2
 * 
 * @return Void
 * @action plugins_loaded
 */
add_action("plugins_loaded", "wp_emoji2_loaded");
function wp_emoji2_loaded() {
    if(wp_emoji2_is_enabled_ktaistyle()) {
        require_once WP_EMOJI2_BASE_DIR. "wp_emoji2_ks.php";
    }
    else {
        require_once WP_EMOJI2_BASE_DIR. "wp_emoji2_default.php";
    }
}


/**
 * do initialize WP Emoji2 global init.
 * 
 * @return Void
 * @action admin_init
 */
add_action("admin_init", "wp_emoji2_admin_init");
function wp_emoji2_admin_init() {
    wp_enqueue_script("wp-emoji2-script", WP_EMOJI2_BASE_URL. "js/wp-emoji2.js", array( "jquery" ));
    wp_enqueue_style("wp-emoji2-style", WP_EMOJI2_BASE_URL. "css/wp-emoji2.css");
}

