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
 * WP Emoji2 utility js.
 * 
 */
(function($){
    // WordPress editor window alias
    var w = window || opener || parent || top;
    var shortcode_base = '[wp_emoji2 code="%code" alt="%alt"] ',
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
