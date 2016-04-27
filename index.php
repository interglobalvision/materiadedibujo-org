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

    <article <?php post_class('col col-12'); ?> id="post-<?php the_ID(); ?>">

      <?php if (!is_page()) { ?>
      <a href="<?php the_permalink() ?>"><h3 class="margin-bottom-small"><?php the_title(); ?></h3></a>
      <?php } ?>

      <?php the_content(); ?>

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