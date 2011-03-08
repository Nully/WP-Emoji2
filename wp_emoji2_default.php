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
 * WP Emoji2 default scripts.
 * not Enabled KtaiStyle plugin load this sctips.
 */
/**
 * Supported shortcode.
 * replace to image tag.
 * ex)
 *   [wp_emoji2 code="d001" alt="sunny"]
 *            replace to
 *   <img src="[wp_emoji2_image_path]/sunny.gif" alt="sunny" />
 */
add_shortcode("wp_emoji2", "wp_emoji2_default_shortcode");
function wp_emoji2_default_shortcode($attr = array()) {
    extract($attr);
    if(!$code) return "[{$alt}: Emoji code is not found.]";

    $map = wp_emoji2_get_image_map();

    $tpl = '<img src="%1$s" alt="%2$s" class="pictgram" />';
    $emoji = sprintf($tpl, (WP_EMOJI2_IMG_URL. $map[$code]["img"]), $alt);

    return $emoji;
}


/**
 * do initialize WP Emoji2 plugin
 * 
 * @return Void
 * @action init
 */
add_action("add_meta_boxes", "wp_emoji2_default_init");
function wp_emoji2_default_init() {
    add_meta_box("wp_emoji2_default", "絵文字", "wp_emoji2_default_metabox_layout", "post", "side", "core");
    add_meta_box("wp_emoji2_default", "絵文字", "wp_emoji2_default_metabox_layout", "page", "side", "core");
}


/**
 * layout for page or post page metabox
 * 
 * @return Void
 */
function wp_emoji2_default_metabox_layout() {
    $map = wp_emoji2_get_image_map();
?>
<?php foreach($map as $code => $attrs): ?>
<img src="<?php echo WP_EMOJI2_IMG_URL. $attrs["img"]; ?>"  alt="<?php echo esc_attr($attrs["alt"]); ?>"/>
<?php endforeach; ?>
<script type="text/javascript">
jQuery(function(){
    jQuery("#wp_emoji2_default img").wpemoji2();
});
</script>
<?php
}

