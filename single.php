<?php
get_header();
?>

<!-- main content -->

<main id="main-content" class="container">

  <!-- main posts loop -->
  <section id="posts">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();

    // Get columns content
    $right_column = apply_filters( 'the_content', get_post_meta( $post->ID, '_igv_right_column', true ) );
    $left_column = apply_filters( 'the_content', get_post_meta( $post->ID, '_igv_left_column', true ) );

?>

    <article id="post-<?php the_ID(); ?>">
      <div class="row">
        <div class="col col-12">
          <a href="<?php the_permalink() ?>"><h3 class="margin-bottom-small font-bold"><?php the_title(); ?></h3></a>
        </div>
      </div>

      <div class="row">
      <?php
      if( !empty( $left_column ) || ( is_single() && in_cat_ancestor_of( 'laboratorio' ) )  ) {
      ?>
        <div class="sidebar col col-3 font-smaller">

        <?php
        if (is_single() && in_cat_ancestor_of('laboratorio')) {
          laboratorio_index();
        }
        ?>

        <?php echo !empty( $left_column ) ? $left_column : '' ; ?>

        </div>
      <?php } ?>

      <div class="col col-5 text-copy">
        <?php the_content(); ?>
      </div>

      <?php if( ! empty($right_column) ) { ?>
        <div class="sidebar col col-3 text-copy font-smaller"><?php echo $right_column; ?></div>
      <?php } ?>
      </div>
    </article>

<?php
  }
} else {
?>
    <div class="row">
      <article class="col col-12 u-alert"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
    </div>
<?php
} ?>

  <!-- end posts -->
  </section>

  <?php get_template_part('partials/pagination'); ?>

<!-- end main-content -->

</main>

<?php
get_footer();
?>
