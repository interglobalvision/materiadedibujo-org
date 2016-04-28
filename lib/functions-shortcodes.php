<?php

function get_laboratorio_index() {
  $output = '';
  $research_cat = get_category_by_slug('investigacion');
  $children = get_categories( array (
    'taxonomy' => 'category',
    'child_of' => $research_cat->term_id,
    'order'    => 'ASC',
  ) );

  // We itarate thru each children of Investigacion
  if ( ! empty( $children ) ) {
    $output .= '<ul class="research-index margin-bottom-small">';
    foreach ( $children as $category ) {

      // On each one we retrive all its posts
      $cat_args = array (
        'cat' => $category->term_id,
        'orderby' => 'title',
        'order' => 'ASC',
      );

      $cat_posts = new WP_Query($cat_args);

      if ( $cat_posts->have_posts() ) {
        $output .= '<li>' . $category->name . '<ul>';

        while( $cat_posts->have_posts() ) {
          $cat_posts->the_post();
          $output .= '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
        }

        $output .= '</ul></li>';
      }
    }
    $output .= '</ul>';
    return $output;
  }
}

function laboratorio_index() {
  echo get_laboratorio_index();
}

add_shortcode('lab_index', 'get_laboratorio_index');
