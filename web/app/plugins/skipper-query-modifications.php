<?php
/*
Plugin Name:  Skipper Query Modification MU-Plugin
Plugin URI:   https://skipperinnovations.com
Description:  Custom Plugin from the man himself... Jason Skipper
Version:      1.0.0
Author:       Jason Skipper
Author URI:   https://skipperinnovations.com
License:      MIT License
*/
/**
 * Reording Posts
 */
function webbuild_query_modifications( $query ) {
  if( $query->is_main_query() ) {

    $query->set( 'orderby', 'name' );
    $query->set( 'order', 'ASC' );

  }
}
add_action('pre_get_posts', 'webbuild_query_modifications');

/*function skipper_adjacent_post_sort( $orderby )
{
    $pattern = '/p.post_date/';
    $replacement = 'p.post_name';
    $orderby = preg_replace($pattern, $replacement, $orderby);
    echo $orderby;
    return $orderby;
}
add_filter( 'get_previous_post_sort', 'skipper_adjacent_post_sort' );
add_filter( 'get_next_post_sort', 'skipper_adjacent_post_sort' );*/

/**
 * Customize Adjacent Post Link Order
 */
 /*
function skipper_adjacent_post_where($sql) {
  if ( !is_main_query() || !is_singular() )
    return $sql;
  $the_post = get_post( get_the_ID() );
  //echo $the_post->post_name . "<br />";
  //echo $sql;
  $patterns = array();
  $patterns[] = '/post_date/';
  $patterns[] = '/\'[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}\'/';
  $replacements = array();
  $replacements[] = 'post_name';
  $replacements[] = $the_post->post_name;
  $final = preg_replace( $patterns, $replacements, $sql );
  //echo $final;
  return preg_replace( $patterns, $replacements, $sql );
}
add_filter( 'get_next_post_where', 'skipper_adjacent_post_where' );
add_filter( 'get_previous_post_where', 'skipper_adjacent_post_where' );

function skipper_adjacent_post_sort($sql) {
  if ( !is_main_query() || !is_singular() )
    return $sql;

  $pattern = '/post_date/';
  $replacement = 'post_name';
  //return preg_replace( $pattern, $replacement, $sql );
  $final = preg_replace( $pattern, $replacement, $sql );
  //echo $final;
  return $final;
}
add_filter( 'get_next_post_sort', 'skipper_adjacent_post_sort' );
add_filter( 'get_previous_post_sort', 'skipper_adjacent_post_sort' );*/
