<article <?php post_class(); ?>>
  <div class="entry-summary hvr-growsm">
    <div class="container">
      <div class="row flex-items-xs-middle">
        <div class="col-md-5 thumbwrapper">
          <div class="skipthumb">
            <a href="<?php the_permalink(); ?>">
              <?php
                if ( has_post_thumbnail() )
                {
                    the_post_thumbnail( 'medium_large' );
                }
                else
                {
              ?>
                <img src="<?php the_field('default_thumbnail','option') ?>" alt="<?php the_title(); ?>" />
              <?php } ?>
            </a>
          </div>
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
