<ul class="research-index">
<?php
// Get investigación ID
$research_cat = get_category_by_slug('investigacion');
$children = get_categories( array ( 
  'taxonomy' => 'category',
  'child_of' => $research_cat->term_id,
  'order'    => 'ASC',
) );

// We itarate thru each children of Investigacion
if ( ! empty( $children ) ) {
  foreach ( $children as $category ) {

    //pr($category);

    // On each one we retrive all its posts
    $cat_args = array ( 
      'cat' => $category->term_id,
      'orderby' => 'title',
      'order' => 'ASC', 
    );

    $cat_posts = new WP_Query($cat_args);
?>

    <?php
    if ( $cat_posts->have_posts() ) {
    ?>
  <li><a href="<?php echo get_category_link($category); ?>"><?php echo $category->name; ?></a>
    <ul>
      <?php
      while( $cat_posts->have_posts() ) {
        $cat_posts->the_post();
      ?>
      <li><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></li>

      <?php
      }
      ?>
    </ul>
  </li>
  <?php
    }
  ?>
  <?php
  }
} else {
?>
  <article class="u-alert"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
<?php
}
?>
</ul>
