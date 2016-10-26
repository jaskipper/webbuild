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
      return $firstcategory = esc_html($categories[0]->name) . " | " . $titleinfo;
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
