<?php
/**
 * General website navigation
 *
 * Non-division or category-branded website navigation
 *
 * @var array $logo     The website logo
 */

$logo = get_query_var('logo');
?>
<div class="nav-wrapper">
  <header class="primary-navigation">

    <?php // Website logo ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <img class="primary-navigation__logo" src="<?php echo $logo['sizes']['320w']; ?>" alt="<?php echo $logo['alt']; ?>" />
    </a>

    <?php // Navigation menu ?>
    <nav class="primary-navigation primary-navigation__links">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
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
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'mobile-nav']);
        endif;
        ?>
      </nav>
    </div>
  </header>
</div>
