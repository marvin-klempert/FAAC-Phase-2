<?php
/**
 * Blog pagination component
 *
 * @var object $query     The relevant query object for the blog roll
 */

$query = get_query_var( 'query' );
?>
<div class="posts__pagination">
  <?php
  echo paginate_links( array(
    'base' => str_replace( 99999999, '%#%', esc_url( get_pagenum_link( 99999999 ) ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var( 'paged' ) ),
    'total' => $query->max_num_pages
  ) );
  ?>
</div>