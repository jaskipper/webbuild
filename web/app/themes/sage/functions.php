<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

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
//Adding ACF Pro Options Page
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

}
//Redirect
function my_template_redirect()
{
  if ( is_user_logged_in() ) {
    the_content();
  } else if ( !is_user_logged_in() && is_page( array( 'join', 'landing', 'membership-checkout', 'membership-invoice', 'membership-confirmation' )  ) ) {
    the_content();
  } else {
    header('Location: ' . wp_login_url());
  }
}
add_action('template_redirect', 'my_template_redirect');

// Menu Helper Function
function getItems($location, $default = null)
{
    $locations = get_nav_menu_locations();

    if (isset($locations[$location]))
    {
        $menu = wp_get_nav_menu_object($locations[$location]);
        return wp_get_nav_menu_items($menu->term_id);
    }

    return $default;
}
