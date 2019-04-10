<?php
/**
 * Displays a navigation menu with custom markup
 *
 * WordPress' normal nav menu is powerful, but verbose. This seeks to work
 * around that by reducing the markup and also adding the option of adding a
 * toggle for menus that have child items.
 *
 * @see https://developer.wordpress.org/reference/functions/wp_nav_menu/
 *
 * @param array $args {
 *  An array of arguments to pass, similar to those used for wp_nav_menu
 *
 *  @option string 'menu'         Desired menu. Accepts a menu ID, slug, name,
 *                                or object
 *  @option string 'menu_class'   Base CSS class to use for the container block
 *                                which forms the menu
 *  @option string 'menu_id'      The ID that is applied to the container
 *                                element wich forms the menu. Default is a
 *                                variant of the menu slug
 *  @option boolean 'toggles'     Whether or not to include toggle buttons for
 *                                menu items with child lists
 *  @option string 'toggle_icon'  If toggle buttons are enabled, the markup to
 *                                appear within the buttons
 *  @option boolean 'top_links'   If the top-level items should be links or
 *                                not. Items with no children will always be
 *                                linked
 * }
 * @return string       HTML markup for the menu
 */

function fwd_nav_menu( $args = array() ) {

  // Default settings array, to be added to the $args if they're not set
  $defaults = array(
    'menu_name' => '',
    'menu_class' => '',
    'menu_id' => '',
    'toggles' => false,
    'toggle_icon' => '&plus;',
    'top_links' => true
  );
  $args = wp_parse_args( $args, $defaults );

  // Sets variables for use in the function
  $name = $args['menu_name'];
  $class = $args['menu_class'];
  $id = $args['menu_id'];
  $toggle = $args['toggles'];
  $icon = $args['toggle_icon'];
  $link = $args['top_links'];

  // Grabs menu locations and the items within the menu provided
  $locations = get_nav_menu_locations();
  if( !isset( $locations[$name] ) ):
    echo 'That menu does not exist';
  else:
    // Sets the menu to be loaded and gets the menu items
    $menu = get_term( $locations[$name], 'nav_menu' );
    $items = wp_get_nav_menu_items( $menu->name );
    ?>
    <nav id="<?php echo $id; ?>" class="<?php echo $class; ?>">
      <ul class="<?php echo $class; ?>__list">
        <?php
        // Cycles through each menu item to create top-level links
        foreach( $items as $item ):
          // Skip items that are not top-level
          if( $item->menu_item_parent != '0' ):
            continue;
          endif;
          $currentID = $item->ID;

          // If there are sub-items, identify that
          $hasChildren = false;
          foreach( $items as $childCheck ):
            if( $childCheck->menu_item_parent == $currentID ):
              $hasChildren = true;
            endif;
          endforeach;

          // If the item has children...
          if( $hasChildren == true ):
          ?>
            <li class="<?php echo $class; ?>__item <?php echo $class; ?>__item--hasChildren">
              <?php
              // Show item title, as a link if top links are enabled
              if( $link == true ):
              ?>
                <a class="<?php echo $class; ?>__link" href="<?php echo $item->url; ?>">
                  <?php echo $item->title; ?>
                </a>
              <?php
              else:
              ?>
                <span class="<?php echo $class; ?>__link <?php echo $class; ?>__link--inactive">
                  <?php echo $item->title; ?>
                </span>
              <?php
              endif;

              // If toggles are enabled, show it
              if( $toggle ):
              ?>
                <button class="<?php echo $class; ?>__toggle">
                  <?php echo $icon; ?>
                </button>
              <?php
              endif;
            // Create submenus
            fwd_sub_nav( $args, $items, $currentID );

          // If the item has no children
          elseif( $hasChildren == false ):
          ?>
            <li class="<?php echo $class; ?>__item">
              <a class="<?php echo $class; ?>__link" href="<?php echo $item->url; ?>">
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
    </nav>
    <?php
  endif;
}