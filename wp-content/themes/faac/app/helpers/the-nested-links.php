<?php
/**
 * Creates a human-readable unordered list for sitemap purposes
 *
 * @var string $parentClass   The CSS class of the parent element
 * @var string $links         The array of links to use for the sitemap
 *
 * @return mixed              A nested list of links
 */

function the_nested_links( $parentClass, $links ) {
  ?>
  <ul class="<?php echo $parentClass; ?>__list">
    <?php
    foreach( $links as $link ):
      $item = $link['link'];
      $title = $item->post_title;
      $url = get_permalink( $item->ID );
      ?>
      <li class="<?php echo $parentClass; ?>__item">
        <a class="<?php echo $parentClass; ?>__link" href="<?php echo $url; ?>">
          <?php echo $title; ?>
        </a>
        <?php
        if( $link['check'] ):
          the_nested_links( $parentClass, $link['children'] );
        endif;
        ?>
      </li>
      <?php
    endforeach;
    ?>
  </ul>
  <?php
}