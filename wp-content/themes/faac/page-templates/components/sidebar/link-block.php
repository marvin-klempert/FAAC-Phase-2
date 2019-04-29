<?php
/**
 * Sidebar link block component
 *
 * @var string $title     Component title
 * @var string $icon      The URL of the icon to display
 * @var object $list      Links to feature in the component
 */

// If a division prefix is set for the page, set it
if( get_query_var( 'division-prefix') ):
  $division = get_query_var( 'division-prefix' );
endif;

$icon = get_query_var( 'icon' );
$title = get_query_var( 'title' );
$list = get_query_var( 'list' );
?>
<div class="sidebar<?php if($division){echo ' sidebar--' . $division;} ?>">
  <div class="sidebar__heading">
    <?php
    if( $icon ):
    ?>
      <img class="sidebar__icon"
        alt="<?php echo $title; ?>"
        src="<?php echo $icon; ?>"
      />
    <?php
    endif;
    ?>
    <h3 class="sidebar__title">
      <?php echo $title; ?>
    </h3>
  </div>
  <nav class="sidebar__links">
    <ul class="sidebar__list">
      <?php
      foreach( $list as $item ):
        ?>
        <li class="sidebar__item">
          <a class="sidebar__link"
            href="<?php
              if( get_post_type($item) == 'attachment'):
                echo wp_get_attachment_url( $item->ID );
              else:
                echo get_permalink( $item->ID );
              endif;
            ?>"
            <?php
            if( get_post_type( $item == 'attachment') ):
              echo 'target="_blank"';
            endif;
            ?>
          >
            <?php echo get_the_title( $item->ID ); ?>
          </a>
        </li>
      <?php
      endforeach;
      ?>
    </ul>
  </nav>
</div>