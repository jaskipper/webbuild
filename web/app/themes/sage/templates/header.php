<header class="cd-header">
	<div class="cd-logo"><a href="/"><img src="<?php the_field('logo', 'option'); ?>" /></a></div>
	<nav>
		<ul class="cd-secondary-nav">
			<?php if ( !is_user_logged_in() ) { ?>
        <li><a href="/membership-account/landing/">Register</a></li>
      <?php } else { ?>
        <li><a href="/">Home</a></li>
      <?php } ?>
      <li><?php wp_loginout(); ?></li>
		</ul>
	</nav> <!-- cd-nav -->

	<a class="cd-primary-nav-trigger" href="#0">
		<span class="cd-menu-text">Menu</span><span class="cd-menu-icon"></span>
	</a> <!-- cd-primary-nav-trigger -->
</header>

<nav>
  <?php
      wp_nav_menu(
              array(
                  'theme_location' => 'primary',
                  'container_class' => '',
                  'menu_class' => 'cd-primary-nav',
                  'fallback_cb' => '',
                  'menu_id' => '',
              )
      );
  ?>
</nav>
