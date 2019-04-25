<?php
/**
 * Navigation widget
 *
 * @var string $menu      The menu to include
 */

$menu = get_query_var('menu');
$args = array(
  'menu' => $menu
);
?>
<section class="footer-navigation">
<?php
  wp_nav_menu( $args );
?>
</section>
