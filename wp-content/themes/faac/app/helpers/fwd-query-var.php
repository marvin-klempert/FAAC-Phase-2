<?php
/**
 *  Add return value to set query var
 */
function fwd_query_var($var_name = '', $acf_field_name = '', $id = '') {
  if (get_field($acf_field_name, $id)) :
    set_query_var($var_name, get_field($acf_field_name, $id));
    return true;
  else:
    return false;
  endif;
}
