<?php
/**
 * The MIT License
 * 
 * Copyright (c) 2011 Nuly
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
/**
 * WP Emoji2 KtaiStyle enabled scripts
 * enabled KtaiStyle plugin loaded this scripts.
 */
/**
 * shortcode parser.
 * display the content replace to KtayStyle supported img tag.
 * ex)
 *  [wp_emoji2 code="d001" alt="sunny"]
 *             replace to
 *  <img localsrc="d001" alt="sunny" />
 * 
 * @param  $attr  Array
 * @return String
 */
add_shortcode("wp_emoji2", "wp_emoji2_ks_shortcode");
function wp_emoji2_ks_shortcode($attr = array()) {
    global $Ktai_Style, $wp_filter;
    extract($attr);

    if(!$code) return;

    $emoji = sprintf('<img localsrc="%1$s" alt="%2$s" />', $code, $alt);
    $emoji = apply_filters("ktai_raw_content", $emoji);
    if(!is_ktai()) {
        $emoji = call_user_func_array(array('KtaiServices', 'convert_pict'), array( "emoji" => $emoji ));
    }
    return $emoji;
}


/**
 * do initialize KtayStyle init
 * 
 * @return Void
 * @action add_meta_boxes
 */
add_action("add_meta_boxes", "wp_emoji2_ks_admin_init");
function wp_emoji2_ks_admin_init() {
    add_meta_box("wp_emoji2_ks", "絵文字", "wp_emoji2_ks_metabox_layout", "post", "side", "core");
    add_meta_box("wp_emoji2_ks", "絵文字", "wp_emoji2_ks_metabox_layout", "page", "side", "core");
}


/**
 * display metabox layout.
 * 
 * @return Void
 */
function wp_emoji2_ks_metabox_layout() {
    global $Ktai_Style;
    $map = wp_emoji2_get_image_map();
?>
<?php foreach($map as $code => $attr): ?>
<img src="<?php echo $Ktai_Style->get("plugin_url"). "pics/SA/". $attr["img"]; ?>" alt="<?php echo esc_attr($attr["alt"]); ?>" rel="<?php echo esc_attr($code); ?>" />
<?php endforeach; ?>
<script type="text/javascript">
jQuery(function(){
    jQuery("#wp_emoji2_ks img").wpemoji2_shortcode();
});
</script>
<?php
}


