<?php
/*
	Plugin Name: PJL Dashboard Widget
	Plugin URI:  https://github.com/lamberger
	Description: My Dashboard Widget
	Version:     0.0.1
	Author:      Patrik Lamberger
	Author URI:  http://patriklamberger.se
	License:     GPL2
	License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit;

function pjl_dash_adding_styles() {
	wp_register_style('pjl_dash_stylesheet', plugins_url('css/dash_widget_style.css', __FILE__), array(), '20160313', 'all');
	wp_enqueue_style('pjl_dash_stylesheet');
}
add_action( 'admin_enqueue_scripts', 'pjl_dash_adding_styles' ); 

function pjl_dash_adding_scripts() {
	wp_register_script('pjl_dash_script', plugins_url('js/dash_widget_script.js', __FILE__), array('jquery'),'1.1', true);
	wp_enqueue_script('pjl_dash_script');
}
add_action( 'admin_enqueue_scripts', 'pjl_dash_adding_scripts' );

add_action('wp_dashboard_setup', 'information');
function information() 
{
	global $wp_meta_boxes;
	wp_add_dashboard_widget(
		'pjl_help', 
		'Some news goes here...', 
		'information_pjl'
	);
}
function information_pjl() 
{ ?>
	<div id="pjl-pjl" class="pjl">
			
		<p class="pjl-version">Some text...</p>
		<!-- <div class="img-block"><img src="<?php echo plugins_url( 'path/to/img', __FILE__ ) ?>"></div> -->
		<p>
			<hr>
			<strong>Need support? Contact someone
			<a href="mailto:example@example.com">here»</a></strong>
		</p>
		<hr>
	</div><!-- end -->
  <?php	
}