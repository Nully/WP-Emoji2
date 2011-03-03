<?php
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
add_action("admin_init", "wp_emoji2_default_init");
function wp_emoji2_default_init() {
    add_meta_box("wp_emoji2_default", "絵文字", "wp_emoji2_default_metabox_layout", "post", "normal", "core");
    add_meta_box("wp_emoji2_default", "絵文字", "wp_emoji2_default_metabox_layout", "page", "normal", "core");
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

