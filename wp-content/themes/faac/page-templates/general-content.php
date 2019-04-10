<?php
/**
 * Template Name: General Content
 * Description: General content page
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <?php
  // Header meta tags
  get_partial('meta', 'head');
  ?>

  <body <?php body_class('general'); ?> ?>

    <?php
    // Google Tag Manager <noscript> option
    get_partial('meta', 'tag-manager-noscript');

    // Included for the sake of plugins and child themes that rely on it.
    do_action('get_header');
    ?>

    <?php
    // Website header area
    ?>
    <header class="general__header">
    </header>

    <?php
    // Main content area
    ?>
    <main class="general__main">
    </main>

    <?php
    // Footer content
    ?>
    <footer class="general__footer">
    </footer>

    <?php
    // Footer meta data and scripts. Includes the WP admin footer, etc.
    get_partial('meta', 'foot');
    ?>
  </body>
</html>