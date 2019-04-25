<?php
/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'fwd') . '</a>';
}
add_filter('excerpt_more', 'excerpt_more');