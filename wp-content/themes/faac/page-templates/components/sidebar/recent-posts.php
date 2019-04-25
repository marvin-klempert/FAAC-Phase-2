<?php
/**
 * Recent posts sidebar component
 *
 * @var array $recent-args     The recent posts arguments to use
 * @var string $title          (optional) The title to use for the component
 */

$args = get_query_var( 'recent-args' );
$title = get_query_var( 'sidebar-title', 'Recent News' );
$recent = wp_get_recent_posts( $args );
?>
<div class="sidebar">
  <h3 class="sidebar__title">
    <?php echo $title; ?>
  </h3>
  <nav class="sidebar__links">
    <ul class="sidebar__list">
      <?php
      foreach( $recent as $item ):
      ?>
        <li class="sidebar__item">
          <a class="sidebar__link" href="<?php echo get_permalink($item['ID']); ?>">
            <?php echo $item['post_title']; ?>
          </a>
        </li>
      <?php
      endforeach;
      wp_reset_query();
      ?>
    </ul>
  </nav>
</div>