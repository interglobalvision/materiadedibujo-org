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
    'options' => array(
      'editor_class' => 'cmb2-qtranslate',
      'textarea_rows' => 10, 
    )
  ) );

  $columns_metaboxes->add_field( array(
    'name'    => __( 'Columna izquierda', 'cmb2' ),
    'desc'    => __( '', 'cmb2' ),
    'id'      => $prefix . 'left_column',
    'type'    => 'wysiwyg',
    'options' => array(
      'editor_class' => 'cmb2-qtranslate',
      'textarea_rows' => 10, 
    )
  ) );


  $links_metaboxes = new_cmb2_box( array(
    'id'            => $prefix . 'metabox',
    'title'         => __( 'Meta', 'cmb2' ),
    'object_types'  => array( 'post' ), // Post type
    // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
    // 'context'    => 'normal',
    // 'priority'   => 'high',
    // 'show_names' => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // true to keep the metabox closed by default
  ) );
  
  $links_group = $links_metaboxes->add_field( array(
    'id'      => $prefix . 'external_links',
    'type'    => 'group',
    'description' => __( 'Campo usado para generar indice de links externos' ),
    'options' => array(
      'group_title' => __( 'Link {#}', 'cmb2' ),
      'add_button' => __( 'Agregar otro link', 'cmb2' ),
      'remove_button' => __( 'Eliminar link', 'cmb2' ),
      'sortable'      => true, // beta
    )
  ) );

  $links_metaboxes->add_group_field( $links_group,  array(
    'name' => 'Dirección',
    'id' => 'link_address',
    'type' => 'text_url'
  ) );

  $links_metaboxes->add_group_field( $links_group,  array(
    'name' => 'Texto',
    'id' => 'link_text',
    'type' => 'text',
    'class=' => 'cmb2',
    'attributes' => array(
      'class' => 'cmb2-qtranslate'
    )
  ) );

}
?>
