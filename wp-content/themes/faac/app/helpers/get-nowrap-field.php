<?php
/**
 * Removes the wrapping paragraph tags from WYSIWYG editor fields
 *
 * By default, the WYSIWYG editor in ACF will output paragraph tags
 * automatically. In cases where there is only one paragraph, this can
 * sometimes cause spacing issues. This function "gets" the field without those
 * tags. Note: Only works with ACF WYSIWYG editor fields.
 *
 * @var string $field_name       The name of the field affected
 * @var string $id               The ID of the post where the field is located
 *                                (defaults to current post)
 * @link https://support.advancedcustomfields.com/forums/topic/removing-paragraph-tags-from-wysiwyg-fields/
 */
function get_nowrap_field( $field_name, $id='' ) {
  if( $id=='' ):
    $id = get_the_ID();
  endif;
  remove_filter('acf_the_content', 'wpautop');
  if( function_exists('get_field') ):
    $field = get_field( $field_name, $id );
  endif;
  add_filter('acf_the_content', 'wpautop');
  return $field;
}