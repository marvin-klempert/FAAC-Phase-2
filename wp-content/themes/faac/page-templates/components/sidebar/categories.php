<?php
/**
 * Categories sidebar component
 *
 * @var array $exclude      (optional) The categories to exclude, if any
 * @var string $title       (optional) The title to use for the component
 */

// If a division prefix is set for the page, set it
if( get_query_var( 'division-prefix') ):
  $division = get_query_var( 'division-prefix' );
endif;


$exclude = get_query_var( 'excluded-cats', array() );
$title = get_query_var( 'sidebar-title', 'Categories' );
$recent = wp_get_recent_posts( $args );
?>
<div class="sidebar<?php if($division){echo ' sidebar--' . $division;} ?>">
  <h3 class="sidebar__title">
    <?php echo $title; ?>
  </h3>
  <nav class="sidebar__links">
    <ul class="sidebar__list">
      <?php
      wp_list_categories( array(
        'orderby' => 'name',
        'title_li' => '',
        'exclude' => $exclude
      ) );
      ?>
    </ul>
  </nav>
</div>