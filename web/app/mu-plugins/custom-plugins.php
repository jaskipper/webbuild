<?php
/*
Plugin Name:  Skipper Custom MU-Plugins
Plugin URI:   https://skipperinnovations.com
Description:  Custom Plugins from the man himself... Jason Skipper
Version:      1.0.0
Author:       Jason Skipper
Author URI:   https://skipperinnovations.com
License:      MIT License
*/

function shortcode_fp_cat_list( $atts ){
  ob_start();

  $categories = get_categories( array(
      'orderby' => 'name',
      'order'   => 'ASC'
  ) );

  foreach( $categories as $category ) {
      $category_link = get_term_link($category);

      $category_first_post = new WP_Query( array(
        'cat' => $category->cat_ID,
        'post_count' => 1,
        'order' => 'DESC'
      ));

      // The Loop
      if ( $category_first_post->have_posts() ) {
        while ( $category_first_post->have_posts() ) {
          $category_first_post->the_post();
          if ( has_post_thumbnail() ) {
            $thumb_id = get_post_thumbnail_id();
            $thumb_url = wp_get_attachment_image_src($thumb_id,'medium_large', true);
            $thumb_url = $thumb_url[0];
          } else {
            $thumb_url = get_field('default_thumbnail','option');
          }
          wp_reset_postdata();
        } // end while
      } // end if

?>
      <article <?php post_class(); ?>>
        <div class="entry-summary hvr-growsm">
          <div class="container">
            <div class="row flex-items-xs-middle">
              <div class="col-md-5 thumbwrapper">
                <a href="<?php echo $category_link; ?>">
                  <div class="skipthumb" style="background-image: url('<?php echo $thumb_url ?>')">
                  </div>
                </a>
              </div>
              <div class="col-md-7 ">
                <header>
                  <div class="titleinfo"><?php echo $category->name ?></div>
                  <h2 class="entry-title"><a href="<?php echo $category_link ?>"><?php echo $category->description ?></a></h2>
                  <a class="btn btn-primary" data-scroll="" href="<?php echo $category_link ?>" rel="m_PageScroll2id">Enter Module...</a>
                  <?php //get_template_part('templates/entry-meta'); ?>
                </header>
                <?php //the_excerpt(); ?>
              </div>
            </div>
          </div>
        </div>
      </article>
  <?php
  }
  $output = ob_get_clean();
  return $output;
}
add_shortcode( 'categories', 'shortcode_fp_cat_list' );
