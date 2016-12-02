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
  } else if ( !is_user_logged_in() && is_page( array( 'register', 'membership-checkout', 'membership-invoice', 'membership-confirmation', 'webinar' )  ) ) {
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

//Add Logged OUT Body class

add_filter('body_class','my_class_names');
function my_class_names($classes) {
    if (! ( is_user_logged_in() ) ) {
        $classes[] = 'logged-out';
    }
    return $classes;
}

/**
 * Link Modals
 */

function modals() {
  $pages = array ('Have a Question?', 'Privacy Policy', 'Terms and Conditions', 'Disclaimer');
  for ($i = 0; $i <= 3; $i++) {
    $supportData = get_page_by_title( $pages[$i] );
    if ($supportData->post_title == "Have a Question?") {
     $content = do_shortcode('[si-contact-form form="1"]');
    } else {
     $content = $supportData->post_content;
    }
    echo '
     <div class="modal fade" id="modal'.$i.'" tabindex="-1" role="dialog" aria-labelledby="modalLabel'.$i.'" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
             <h4 class="modal-title" id="myModalLabel">'.$supportData->post_title.'</h4>
           </div>
           <div class="modal-body">'.
               $content
           .'</div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           </div>
         </div>
       </div>
     </div>';
  }
} // Modals

/*
 * Adding Scripts and Stylesheets
 */

function wp_add_skip_scripts() {
  wp_enqueue_style( 'wp-google-fonts', 'https://fonts.googleapis.com/css?family=PT+Sans+Narrow|PT+Sans:400,700', false );
  wp_enqueue_style( 'wp-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', false );
}
add_action( 'wp_enqueue_scripts', 'wp_add_skip_scripts' );

/*
 * Adding Piwik code
 */
function add_piwik() { ?>
  <!-- Piwik Code -->
  <script type="text/javascript">
    var _paq = _paq || [];
    _paq.push(["setDomains", ["*.webbuild.skipperinnovations.com"]]);
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
      var u="//skipperinnovations.com/piwik/";
      _paq.push(['setTrackerUrl', u+'piwik.php']);
      _paq.push(['setSiteId', '5']);
      var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
      g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
    })();
  </script>
  <noscript><p><img src="//skipperinnovations.com/piwik/piwik.php?idsite=5" style="border:0;" alt="" /></p></noscript>
  <!-- End Piwik -->
  <?php
}
add_action('wp_footer', 'add_piwik');
