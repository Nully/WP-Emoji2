/**
 * WP Emoji2 utility js.
 * 
 */
(function($){
    // WordPress editor window alias
    var w = window || opener || parent || top;
    var shortcode_base = '[wp_emoji2 code="%code" alt="%alt"]',
        html_base = '<img src="%src" alt="%alt" />';

    // insert WordPress supported shortcode tag.
    $.fn.wpemoji2_shortcode = function() {
        return this.click(function(){
            var $t = $(this);
            w.send_to_editor(shortcode_base.replace("%code", $t.attr("rel")).replace("%alt", $t.attr("alt")));
        });
    };

    // insert Image tag
    $.fn.wpemoji2 = function() {
        return this.click(function(){
            var $t = $(this);
            w.send_to_editor(html_base.replace("%src", $t.attr("src")).replace("%alt", $t.attr("alt")));
        });
    };
})(jQuery);
