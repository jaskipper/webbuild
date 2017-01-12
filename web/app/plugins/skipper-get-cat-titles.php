<?php
/*
Plugin Name:  Skipper Get Cateogry Titles MU-Plugin
Plugin URI:   https://skipperinnovations.com
Description:  Custom Plugin from the man himself... Jason Skipper
Version:      1.0.0
Author:       Jason Skipper
Author URI:   https://skipperinnovations.com
License:      MIT License
*/

function get_the_cat_title_skipper() {
    if ( is_category() ) {
        $title = sprintf( __( '%s' ), single_cat_title( '', false ) );
    } else {
        $title = __( '' );
    }

    /**
     * Filters the archive title.
     *
     * @since 4.1.0
     *
     * @param string $title Archive title to be displayed.
     */
    return apply_filters( 'get_the_cat_title_skipper', $title );
}
