<article <?php post_class(); ?>>
  <div class="entry-summary hvr-growsm">
    <div class="container">
      <div class="row flex-items-xs-middle">
        <div class="col-md-5 thumbwrapper">
          <a href="<?php the_permalink(); ?>">
            <?php
              if ( has_post_thumbnail() ) {
                $thumb_id = get_post_thumbnail_id();
                $thumb_url = wp_get_attachment_image_src($thumb_id,'medium_large', true);
                $thumb_url = $thumb_url[0];
              } else {
                $thumb_url = get_field('default_thumbnail','option');
              }
            ?>
            <div class="skipthumb" style="background-image: url('<?php echo $thumb_url ?>')">
            </div>
          </a>
        </div>
        <div class="col-md-7 ">
          <header>
            <div class="titleinfo"><?php the_field('title_info'); ?></div>
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <a class="btn btn-primary" data-scroll="" href="<?php the_permalink(); ?>" rel="m_PageScroll2id">Enter Lesson...</a>
            <?php //get_template_part('templates/entry-meta'); ?>
          </header>
          <?php //the_excerpt(); ?>
        </div>
      </div>
    </div>
  </div>
</article>
