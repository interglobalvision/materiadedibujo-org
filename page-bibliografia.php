<?php
get_header();
?>

<!-- main content -->

<main id="main-content" class="container">

  <!-- main posts loop -->
  <section id="posts" class="row">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();

?>

    <article id="post-<?php the_ID(); ?>">

        <div class="col col-12 text-copy">
          <?php the_content(); ?>
        </div>

    </article>

<?php
  }
} else {
?>
    <article class="col col-12 u-alert"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
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
