<?php

/* Get post objects for select field options */
function get_post_objects( $query_args ) {
$args = wp_parse_args( $query_args, array(
    'post_type' => 'post',
) );
$posts = get_posts( $args );
$post_options = array();
if ( $posts ) {
    foreach ( $posts as $post ) {
        $post_options [ $post->ID ] = $post->post_title;
    }
}
return $post_options;
}


/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Hook in and add metaboxes. Can only happen on the 'cmb2_init' hook.
 */
add_action( 'cmb2_init', 'igv_cmb_metaboxes' );
function igv_cmb_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_igv_';

	/**
	 * Metaboxes declarations here
   * Reference: https://github.com/WebDevStudios/CMB2/blob/master/example-functions.php
	 */

  $columns_metaboxes = new_cmb2_box( array(
    'id'            => $prefix . 'metabox',
    'title'         => __( 'Columnas', 'cmb2' ),
    'object_types'  => array( 'page', 'post' ), // Post type
    // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
    // 'context'    => 'normal',
    // 'priority'   => 'high',
    // 'show_names' => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // true to keep the metabox closed by default
  ) );

  $columns_metaboxes->add_field( array(
    'name'    => __( 'Columna derecha', 'cmb2' ),
    'desc'    => __( '', 'cmb2' ),
    'id'      => $prefix . 'right_column',
    'type'    => 'wysiwyg',
    'options' => array( 'textarea_rows' => 10, ),
    'options' => array(
      'editor_class' => 'cmb2-qtranslate'
    )
  ) );

  $columns_metaboxes->add_field( array(
    'name'    => __( 'Columna izquierda', 'cmb2' ),
    'desc'    => __( '', 'cmb2' ),
    'id'      => $prefix . 'left_column',
    'type'    => 'wysiwyg',
    'options' => array( 'textarea_rows' => 10, ),
    'options' => array(
      'editor_class' => 'cmb2-qtranslate'
    )
  ) );

}
?>
