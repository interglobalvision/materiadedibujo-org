<?php
if( get_next_posts_link() || get_previous_posts_link() ) {
?>
  <!-- post pagination -->
  <nav id="pagination">
<?php
$previous = get_previous_posts_link(__('[:es]Más Nuevo[:en]Newer'));
$next = get_next_posts_link(__('[:es]Más Viejo[:en]Older'));
if ($previous) {
  echo $previous;
}
if ($previous && $next) {
  echo ' &mdash; ';
}
if ($next) {
  echo $next;
}
?>
  </nav>
<?php
}
?>