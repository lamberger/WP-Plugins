<?php
/*
Plugin Name: PL Custom Login Logo
Plugin URI: https://github.com/lamberger
Description: Change the admin login logo
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

// Custom login logo. Place your image in the theme folder.You may need to change the path.
function kupl_custom_login_logo() {
	echo '<style type="text/css">
			h1 a { background-image: url('.get_bloginfo('template_directory').'/path/to/image) !important; }
		  </style>';
}
add_action('login_head', 'kupl_custom_login_logo');