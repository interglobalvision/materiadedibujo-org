<?php
get_header();
?>

<!-- main content -->

<main id="main-content" class="container">

  <!-- main posts loop -->
  <section id="posts" class="row">

<?php
$category_text = category_description();
if (!empty($category_text)) {
?>

    <div class="sidebar col col-3 text-copy font-smaller">
      <?php echo $category_text; ?>
    </div>

<?php
}
?>

    <div class="col col5 text-copy">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();
?>
    <a href="<?php the_permalink() ?>">
      <article id="post-<?php the_ID(); ?>" class="margin-bottom-small">
        <h5><?php the_title(); ?></h5>
        <h5><?php the_time('d/Y'); ?></h5>
      </article>
    </a>

<?php
  }
} else {
?>
    <article class="col col-12 u-alert"><?php _e('Sorry, no posts matched your criteria'); ?></article>
<?php
} ?>

    <?php get_template_part('partials/pagination'); ?>

    </div>

  <!-- end posts -->
  </section>


<!-- end main-content -->

</main>

<?php
get_footer();
?>
