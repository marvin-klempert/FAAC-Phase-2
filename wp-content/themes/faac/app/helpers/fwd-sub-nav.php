<?php
/**
 * Recursive function to create sub navigation menus
 *
 * @param array $args           Navigation menu arguments, similar to
 *                              wp_nav_menu()
 * @param array $items          The contens of the menu to be created and
 *                              checked against
 * @param string $currentID     The ID of the post to start the submenu for
 *
 * @return mixed                The sub menu markup
 */

function fwd_sub_nav( $args, $items, $currentID ) {

  // Sets variables for use in the function
  $class = $args['menu_class'];
  $toggle = $args['toggles'];
  $icon = $args['toggle_icon'];
  ?>
  <ul class="<?php echo $class; ?>__sub">
    <?php
    // Cycles through each menu item to create sub-level links
    foreach( $items as $item ):
      // Skip items with the incorrect parent post
      if( $item->menu_item_parent != $currentID ):
        continue;
      endif;
      $subID = $item->ID;

      // If there are sub-items, list them here
      $hasChildren = false;
      foreach( $items as $childCheck ):
        if( $childCheck->menu_item_parent == $subID ):
          $hasChildren = true;
        endif;
      endforeach;
      if( $hasChildren == true ):
      ?>
        <li class="<?php echo $class; ?>__subItem <?php echo $class; ?>__subItem--hasChildren">
          <a class="<?php echo $class; ?>__subLink" href="<?php echo $item->url; ?>">
            <?php echo $item->title; ?>
          </a>
          <?php
          if( $toggle ):
          ?>
            <button class="<?php echo $class; ?>__toggle">
              <?php echo $icon; ?>
            </button>
          <?php
          endif;
          // Create submenus
          fwd_sub_nav( $args, $items, $subID );

        // If the item has no children
        elseif( $hasChildren == false ):
        ?>
          <li class="<?php echo $class; ?>__subItem">
            <a class="<?php echo $class; ?>__subLink" href="<?php echo $item->url; ?>">
              <?php echo $item->title; ?>
            </a>
        <?php
        endif;
        ?>
      </li>
      <?php
    endforeach;
    ?>
  </ul>
  <?php
}