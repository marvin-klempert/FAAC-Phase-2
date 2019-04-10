<div class="nav-wrapper universal">
  <header class="primary-navigation">
    <div class="super-navigation super-navigation__toggle">
      <!-- Site Logo -->
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php $logo = get_field('faac_menuLogo', 'option'); ?>
        <img src="<?php echo $logo['url']; ?>"
          alt="<?php echo $logo['alt']; ?>"
        />
      </a>
      <button class="super-navigation super-navigation__button" id="toggle" >
        &#xf0c9;
      </button>
    </div>

    <!-- Navigation Menu -->
    <nav id="drawer" class="super-navigation__links">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
        endif;
        ?>
    </nav>

    <?php
      $division = get_the_terms( get_the_ID(), 'division' );
      $divisionName = $division[0]->name;
        if( $divisionName == 'FAAC Commercial' ){
          $divisionMenu = 'faacCommercial';
        } elseif( $divisionName == 'FAAC Military' ){
          $divisionMenu = 'faacMilitary';
        } elseif( $divisionName == 'MILO Range' ){
          $divisionMenu = 'miloRange';
        } elseif( $divisionName == 'Realtime Technologies' ){
          $divisionMenu = 'rti';
        } else {
          $divisionMenu = 'none';
        }

        $menuLogo = $divisionMenu . '_menuLogo';
        $menuNavigation = $divisionMenu . '_navigation';
        $menuHomepage = $divisionMenu . '_homepage';
        $menuDivision = $divisionMenu . '_name';
    ?>
    <div class="division-navigation-wrapper">
      <!-- Site Logo -->
      <a href="<?php echo get_field( $menuHomepage, 'option' ); ?>">
        <img src="<?php echo get_field( $menuLogo, 'option' );  ?>"
          alt="<?php echo get_field( $menuDivision, 'option' ); ?>"
        />
      </a>

      <!-- Navigation Menu -->
      <nav class="primary-navigation__links">
        <?php
          if (has_nav_menu($menuNavigation)) :
            wp_nav_menu(['theme_location' => $menuNavigation, 'menu_class' => 'nav']);
          endif;
        ?>
      </nav>
      <div class="navigation-search">
        <div class="search-trigger">
          <a href="#">
            <i class="fa fa-search" aria-hidden="true"></i>
          </a>
        </div>
        <div class="primary-navigation primary-navigation__search search-form">
          <form role="search" method="get" action="<?php echo home_url( '/'); ?>">
            <label>
              <input type="search" class="search-field"
                placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder' ) ?>"
                value="<?php echo get_search_query() ?>" name="s"
                title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
            </label>
            <input type="submit" class="search-submit"
              value="<?php echo esc_attr_x( '>', 'submit button' ) ?>" />
          </form>
        </div>
      </div>

      <div class="primary-navigation primary-navigation__mobile-menu">
        <button class="primary-navigation primary-navigation__button" id="mobile-toggle" >
          &#xf0c9;
        </button>
        <nav id="mobile-menu" class="primary-navigation__links">
          <?php
          if (has_nav_menu($menuNavigation)) :
            wp_nav_menu(['theme_location' => $menuNavigation, 'menu_class' => 'mobile-nav']);
          endif;
          ?>
        </nav>
      </div>

    </div>
  </header>
</div>
