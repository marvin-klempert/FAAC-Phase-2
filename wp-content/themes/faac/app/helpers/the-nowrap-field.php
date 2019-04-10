<?php
/**
 * Echoes fields from get_nowrap_field()
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
function the_nowrap_field( $field_name, $id='' ) {
  echo get_nowrap_field( $field_name, $id='' );
}