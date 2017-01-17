<?php
/*
Plugin Name:  Skipper PMPRO Discount Applied from URL Param MU-Plugin
Plugin URI:   https://skipperinnovations.com
Description:  Custom Plugin from the man himself... Jason Skipper
Version:      1.0.0
Author:       Jason Skipper
Author URI:   https://skipperinnovations.com
License:      MIT License
*/

function enqueue_skipper_pmpro_url_includes(){
   wp_enqueue_script('pmprojs', plugins_url('includes/skipper-pmpro.js', __FILE__), array('jquery') );
   wp_enqueue_style( 'pmprocss', plugins_url('includes/skipper-pmpro.css', __FILE__), false, '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_skipper_pmpro_url_includes');

function removeDiscountCode($discount_code) {
    if ( pmpro_checkDiscountCode($discount_code) ) { ?>

            showDiscountCodeItems();

    <?php } else { ?>

            showDiscountCodeFailed();

    <?php }
} // end of function
add_action( 'pmpro_applydiscountcode_return_js', 'removeDiscountCode' );
?>
