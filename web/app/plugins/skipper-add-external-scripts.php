<?php
/*
Plugin Name:  Skipper Add External Scripts MU-Plugin
Plugin URI:   https://skipperinnovations.com
Description:  Custom Plugin from the man himself... Jason Skipper
Version:      1.0.0
Author:       Jason Skipper
Author URI:   https://skipperinnovations.com
License:      MIT License
*/

/*
 * Adding Scripts and Stylesheets
 */

function wp_add_skip_scripts() {
  wp_enqueue_style( 'wp-google-fonts', 'https://fonts.googleapis.com/css?family=PT+Sans+Narrow|PT+Sans:400,700', false );
  wp_enqueue_style( 'wp-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', false );
}
add_action( 'wp_enqueue_scripts', 'wp_add_skip_scripts' );
