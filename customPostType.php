<?php
/*
Plugin Name: PL Custom Post Type
Plugin URI: https://github.com/lamberger/
Description: Custom Post Type
Version: 1.0
Author: Patrik Lamberger   
Author URI: http://patriklamberger.se/
*/  
if ( ! defined( 'ABSPATH' ) ) exit;

class PL_Custom_Post_Type { 
	
	public function __construct()
	{
		$this->register_post_type();
	} 
	
	public function register_post_type()
	{
	    $args = array(
	    	'labels' => array(
	   	  		'name' => 'Custom P-T',
				'singular_name' => 'Singular Name',
				'add_new' => 'Add New Name',
				'add_new_item' => 'Add new name',
				'edit_item' => 'Edit Item',
				'new_item' => 'Add New Item',
				'view_item' => 'View Typ-name',
				'search_item' => 'Search Type',
				'not_found' => 'No Typ Found',
				'not_found_in_trash' => 'No Typ Found In Trash'
			),
			'query_var' => 'custom_type',
			'rewrite' => array(
				'slug' => 'typ/',
			),
			'public' => true,
			'menu_position' => 2,
			'menu_icon' => admin_url() . 'images/yes.png',
			'supports' => array(
				'title',
				'thumbnail',
				'editor',
				'custom-fields'
			)
	    );
		register_post_type('pl_type', $args);
	}
}

add_action('init', function(){
   new PL_Custom_Post_Type(); 
});
