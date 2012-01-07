<?php
/*
Plugin Name: PL Excerpt Control 
Plugin URI: https://github.com/lamberger
Description: Set the number of words you want in the excerpt. The excerpt ends with a "Read more" link
Version: 1.0
Author: Patrik Lamberger   
Author URI: https://github.com/lamberger 
License: GNU General Public License, version 2, GPL2
*/  
 
/* 
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

*/

// Puts a link after the excerpt...Read more
function kupl_excerpt_more($more) {
	global $post;   
	return '… <a class="moretag" href="'. get_permalink($post->ID) . '" title="' . get_the_title($post->ID) . '">Read more</a>';
}
add_filter('excerpt_more', 'kupl_excerpt_more');

//Number of words in the excerpt. Change it to what ever you like 
function kupl_excerpt_length($length) {
	return 30;
}
add_filter('excerpt_length', 'kupl_excerpt_length');
