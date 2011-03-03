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

