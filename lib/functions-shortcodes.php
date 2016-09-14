<?php

function get_laboratorio_index() {
  $output = '';
  $research_cat = get_category_by_slug('laboratorio');
  $children = get_categories( array (
    'child_of' => $research_cat->term_id,
    'order'    => 'ASC',
  ) );

  // We itarate thru each children of Investigacion
  if ( ! empty( $children ) ) {
    $output .= '<ul class="research-index font-leading-wider margin-bottom-small">';
    foreach ( $children as $category ) {

      // On each one we retrive all its posts
      $cat_args = array (
        'cat' => $category->term_id,
        'orderby' => 'title',
        'order' => 'ASC',
      );

      $cat_posts = new WP_Query($cat_args);

      if ( $cat_posts->have_posts() ) {
        $output .= '<li><strong>' . $category->name . '</strong><ul class="margin-bottom-small">';

        while( $cat_posts->have_posts() ) {
          $cat_posts->the_post();
          $output .= '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
        }

        $output .= '</ul></li>';
      }
    }

    // Add link to bibliography
    $bibliography = get_page_by_path('laboratorio/bibliografia');
    $output .= '<li><a href="' . get_permalink($bibliography->ID)  . '"><strong>' . __('[:es]Bibliografía[:en]Bibliography') . '</strong></a></li>';

    $output .= '</ul>';

    wp_reset_postdata();

    return $output;
  }
}

function laboratorio_index() {
  echo get_laboratorio_index();
}

add_shortcode('lab_index', 'get_laboratorio_index');
