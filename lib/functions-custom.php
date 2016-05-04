<?php

// Custom functions (like special queries, etc)
function in_cat_ancestor_of($parent_slug) {
  $partent_category = get_category_by_slug($parent_slug);
  $categories = get_the_category();

  foreach($categories as $category) {
    if( cat_is_ancestor_of($partent_category, $category) ) {
      return true;
    }
  }

  return false;
}
