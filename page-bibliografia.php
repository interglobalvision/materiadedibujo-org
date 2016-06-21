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

?>

    <article id="post-<?php the_ID(); ?>">
      <div class="row">
        <div class="col col-12">
          <a href="<?php the_permalink() ?>"><h3 class="margin-bottom-small font-bold"><?php the_title(); ?></h3></a>
        </div>
      </div>

      <div class="row">

        <div class="col col-12 text-copy">
          <?php the_content(); ?>
        </div>

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
