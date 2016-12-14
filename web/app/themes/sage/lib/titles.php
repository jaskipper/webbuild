<?php

namespace Roots\Sage\Titles;

/**
 * Page titles
 */
function title() {
  if (is_home()) {
    if (get_option('page_for_posts', true)) {
      return get_the_title(get_option('page_for_posts', true));
    } else {
      return __('Latest Posts', 'sage');
    }
  } elseif (is_archive()) {
    return category_description();
  } elseif (is_search()) {
    return sprintf(__('Search Results for %s', 'sage'), get_search_query());
  } elseif (is_404()) {
    return __('Not Found', 'sage');
  } else {
    return get_the_title();
  }
}
function subTitle() {
  $titleinfo = get_field('title_info');
  if (is_home()) {
    if (get_option('page_for_posts', true)) {
      return $titleinfo;
    } else {
      return __('Latest Posts', 'sage');
    }
  } elseif (is_archive()) {
    return get_the_cat_title_skipper();
  } elseif (is_search()) {
    return 'Search';
  } elseif (is_404()) {
    return 'Uh oh...';
  } else {
    $categories = get_the_category();

    if ( ! empty( $categories ) ) {
      return $firstcategory = "<a href='" . get_category_link( $categories[0]->term_id ) . "' >" . esc_html($categories[0]->name) . "</a> | " . $titleinfo;
    } else {
      return $titleinfo;
    }
  }
}
function buttonText() {
  if ( is_archive() ) {
      the_field('default_archive_button_text', 'option');
  } else if ( get_field ('button_text') != '' ) {
      the_field('button_text');
  } else if ( in_category( array('Module 1','Module 2','Module 3','Module 4','Module 5') ) ) {
      echo "View Lesson";
  } else if ( in_category( 'Tools and Resources' ) ) {
      echo "View Resources";
  } else {
      the_field('default_button_text', 'option');
  }
}
function h1FontSize() {
  if ( get_field('h1_font_size') != '' ) {
    the_field('h1_font_size');
  } else {
    the_field('default_h1_font_size');
  }
}
function categoryNavLinks() {

  if ( in_category( array('Module 1','Module 2','Module 3','Module 4','Module 5', 8) ) ) {
    $next = get_next_post_link('%link', 'Next Lesson »', TRUE);
    $previous = get_previous_post_link('%link', '« Previous Lesson', TRUE);

    $categories = get_the_category();
    $position = $categories[0]->term_id;
    $module5 = 11;
    $module4 = 6;
    $module3 = 5;
    $module2 = 4;
    $module1 = 3;
    $resources = 8;

    $separator = ' | ';
    if ( !is_archive() ) {
      if ( $next == "" || $previous == "" ) {
        $separator = "";
      }
    }

    $post = get_post();
    echo $post->current_post;

    if ( is_archive() ) { //If This is an Archive Give it Module Links

      if ( $position == $module1 ) {
        $previous = '<a href="/">« Home</a>'; //If we are at the beginning Give a Home Link
        $next = "<a href='" . get_category_link( $module2 ) . "'>" . get_cat_name( $module2 ) . " »</a>";
      }
      if ( $position == $module2 ) {
        $previous = "<a href='" . get_category_link( $module1 ) . "'>« " . get_cat_name( $module1 ) . "</a>";
        $next = "<a href='" . get_category_link( $module3 ) . "'>" . get_cat_name( $module3 ) . " »</a>";
      }
      if ( $position == $module3 ) {
        $previous = "<a href='" . get_category_link( $module2 ) . "'>« " . get_cat_name( $module2 ) . "</a>";
        $next = "<a href='" . get_category_link( $module4 ) . "'>" . get_cat_name( $module4 ) . " »</a>";
      }
      if ( $position == $module4 ) {
        $previous = "<a href='" . get_category_link( $module3 ) . "'>« " . get_cat_name( $module3 ) . "</a>";
        $next = "<a href='" . get_category_link( $module5 ) . "'>" . get_cat_name( $module5 ) . " »</a>";
      }
      if ( $position == $module5 ) {
        $previous = "<a href='" . get_category_link( $module4 ) . "'>« " . get_cat_name( $module4 ) . "</a>";
        $next = "<a href='" . get_category_link( $resources ) . "'>" . get_cat_name( $resources ) . " »</a>";
      }
      if ( $position == $resources ) {
        $previous = "<a href='" . get_category_link( $module5 ) . "'>« " . get_cat_name( $module5 ) . "</a>";
        $next = '<a href="/">Home »</a>';;
      }
    }

    echo "<span class='linkprev'>" . $previous . "</span><span class='linkseparator'>" . $separator . "</span><span class='linknext'>" . $next . "</span>";

  }
}
