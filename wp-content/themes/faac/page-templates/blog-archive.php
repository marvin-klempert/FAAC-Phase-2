<?php
/**
 * Template Name: Blog Archive
 * Description: Blog archive page
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <?php
  // Header meta tags
  get_partial('meta', 'head');
  ?>

  <body <?php body_class('blog blog--archive'); ?> ?>

    <?php
    // Google Tag Manager <noscript> option
    get_partial('meta', 'tag-manager-noscript');

    // Included for the sake of plugins and child themes that rely on it.
    do_action('get_header');
    ?>

    <?php
    // Website header area
    ?>
    <header class="blog__header">
    </header>

    <?php
    // Main content area
    ?>
    <main class="blog__main">
    </main>

    <?php
    // Sidebar
    ?>
    <aside class="blog__sidebar">
    </aside>

    <?php
    // Footer content
    ?>
    <footer class="blog__footer">
    </footer>

    <?php
    // Footer meta data and scripts. Includes the WP admin footer, etc.
    get_partial('meta', 'foot');
    ?>
  </body>
</html>