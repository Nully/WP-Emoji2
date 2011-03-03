<?php
/**
 * is Enabled Ktai-Style plugin ?
 * 
 * @return Bool
 */
function wp_emoji2_is_enabled_ktaistyle() {
    return function_exists("is_ktai") || class_exists("KtaiStyle");
}


/**
 * get image map.
 * 
 * @access public
 * @return Array
 */
function wp_emoji2_get_image_map() {
    static $map;
    if(!$map) {
        $map = require_once WP_EMOJI2_BASE_DIR. "wp-emoji2-map.php";
    }

    return $map;
}

