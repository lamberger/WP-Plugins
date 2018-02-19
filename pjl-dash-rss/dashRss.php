<?php
/*
Plugin Name: Dash Rss
Plugin URI: https://github.com/lamberger
Description: Admin widget that brings in a feed
Version: 0.1.0
Author: Patrik Lamberger
Author URI: https://patriklamberger.com
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

//No direct calls to this file where wp core not present
if (!function_exists ('add_action')) {
        header('Status: 403 Forbidden');
        header('HTTP/1.1 403 Forbidden');
        exit();
}

add_action('wp_dashboard_setup', 'skh_pjl_jss_dash_widget');

function skh_pjl_jss_dash_widget()
{
    global $wp_meta_boxes;
    wp_add_dashboard_widget('skhpjl-widget', 'Senaste inläggen på Stiftelsen Karlstadshus', 'skh_pjl_jss_widget');
}

function skh_pjl_jss_widget()
{
    include_once( ABSPATH . WPINC . '/feed.php' );

    $rss = fetch_feed( 'http://stiftelsen-karlstadshus.se/feed/' );

    if (! is_wp_error( $rss )) :
        // Total items, limit it to 5.
        $maxitems = $rss->get_item_quantity( 5 );

        // Array of all items, starting with first element.
        $rss_items = $rss->get_items( 0, $maxitems );
    endif;

    { ?>
    <div class="rss-widget">
        <a href="http://stiftelsen-karlstadshus.se/feed/" title="RSS Feed SKH" target="_blank" class="alignright"><span class="dashicons dashicons-rss"></span> SKH FEED</a>   
        <ul>
            <?php if ($maxitems == 0) : ?>
                <li><?php _e( 'No items', 'skhpjl' ); ?></li>
            <?php else : ?>
                <?php // Loop feed item and display as a hyperlink. ?>
                <?php foreach ($rss_items as $item) : ?>
                    <li>
                        <a href="<?php echo esc_url( $item->get_permalink() ); ?>" target="_blank">
                        <span class="dashicons dashicons-external"></span> <?php echo esc_html( $item->get_title() ); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
        <div style="border-top: 1px solid #fff; padding-top: 10px; text-align:center;">
            <a style="color:blue; font-weight:bold;" href="http://stiftelsen-karlstadshus.us7.list-manage.com/subscribe?u=b2b944de344272e90c2262dd5&id=1f07676e88" target="_blank"><span class="dashicons dashicons-clipboard"></span> Prenumerera på Stiftelsen Karlstadshus nyhetsbrev</a>
        </div>
    </div>
<?php 
    }
}
function my_admin_theme_style() {
    wp_enqueue_style('my-admin-widget', plugins_url('wp-admin-wiget.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'my_admin_theme_style');