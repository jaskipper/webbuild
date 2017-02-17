<?php
/*
Plugin Name:  Skipper Redirect MU-Plugin
Plugin URI:   https://skipperinnovations.com
Description:  Custom Plugin from the man himself... Jason Skipper
Version:      1.0.0
Author:       Jason Skipper
Author URI:   https://skipperinnovations.com
License:      MIT License
*/

//Redirect
function my_template_redirect()
{
  if ( is_user_logged_in() ) {
    the_content();
  } else if ( !is_user_logged_in() && is_page( array( 'register', 'membership-checkout', 'membership-invoice', 'membership-confirmation', 'webinar', 'webinarvideo' )  ) ) {
    the_content();
  } else {
    header('Location: ' . wp_login_url());
  }
}
add_action('template_redirect', 'my_template_redirect');



//Add Logged OUT Body class

add_filter('body_class','my_class_names');
function my_class_names($classes) {
    if (! ( is_user_logged_in() ) ) {
        $classes[] = 'logged-out';
    }
    return $classes;
}
