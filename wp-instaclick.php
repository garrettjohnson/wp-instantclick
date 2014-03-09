<?php
/*
 * Plugin Name: Instantclick for WordPress
 * Plugin URI: https://github.com/neverarriving/wp-instantclick
 * Author: Garrett Johnson
 * Version: 1.0
 * Description: Effectively instant navigation.
 * License: MIT
 */

function wpt_enqueue_instantclick() {
	  $js_file = 'instantclick.min.js';
	  if (WP_DEBUG)
	    $js_file = 'instantclick.js';
    echo '<script src="'.plugin_dir_url(__FILE__) . 'js/' . $js_file.'" data-no-instant></script>';
}
// Add hook for front-end <head></head>
add_action('wp_head', 'wpt_enqueue_instantclick');


function intilize_instantclick() {
  if ( wp_script_is( 'jquery', 'done' ) ) {
?>
<script data-no-instant>InstantClick.init();</script>
<?php
  }
}
add_action( 'wp_footer', 'intilize_instantclick' );
