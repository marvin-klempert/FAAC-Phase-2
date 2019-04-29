<?php
/**
 * Category headings component
 *
 * @var array $headings     The blocks of category headings to include
 */

$headings = get_query_var( 'headings' );
$division = get_division_class();
?>
<div class="category-heading<?php if($division){echo ' category-heading--' . $division;}?>">
<?php
foreach( $headings as $block ):
  $label = $block['heading_select']['label'];
  $selectVal = $block['heading_select']['value'];
  $iconVal = $block['heading_icon']['value'];
  $icon = get_field( $iconVal . '_icon', 'option' );
  $upper = $block['heading_upperText'];
  $linkSelector = $block['heading_linkSelector'];
  $page = $block['heading_linkedPage'];
  $imageSelector = $block['heading_imageSelector'];
  if( $imageSelector == true ):
    $background = $block['heading_image'];
  else:
    $background = get_field( $selectVal . '_headingBackground', 'option' );
  endif;

  // If $linkSelector is 1, wrap the div in a link
  if( $linkSelector == 1 ):
  ?>
    <a href="<?php echo $page; ?>">
  <?php
  endif;
  ?>
  <div class="category-heading__block">
    <img class="category-heading__background lazyload lazyload--blurUp"
      alt="<?php echo $background['alt']; ?>" data-sizes="auto"
      data-src="<?php echo $background['sizes']['preload']; ?>"
      data-srcset="<?php echo $background['sizes']['preload']; ?> 64w,
        <?php echo $background['sizes']['375w']; ?> 65w,
        <?php echo $background['sizes']['480w']; ?> 376w,
        <?php echo $background['sizes']['540w']; ?> 481w,
        <?php echo $background['sizes']['640w']; ?> 541w,
        <?php echo $background['sizes']['720w']; ?> 641w,
        <?php echo $background['sizes']['768w']; ?> 721w,
        <?php echo $background['sizes']['800w']; ?> 769w,
        <?php echo $background['sizes']['960w']; ?> 801w,
        <?php echo $background['sizes']['1024w']; ?> 961w,
        <?php echo $background['sizes']['1280w']; ?> 1025w,
        <?php echo $background['sizes']['1366w']; ?> 1281w,
        <?php echo $background['sizes']['1440w']; ?> 1367w,
        <?php echo $background['sizes']['1600w']; ?> 1441w,
        <?php echo $background['sizes']['1920w']; ?> 1601w,
        <?php echo $background['sizes']['2560w']; ?> 1921w
      "
    />
    <div class="category-heading__content">
      <?php
      // Icon, if set
      if( $iconVal != 'none' ):
      ?>
        <img class="category-heading__icon lazyload lazyload--blurUp"
          alt="<?php echo $icon['alt']; ?>" data-sizes="auto"
          data-src="<?php echo $icon['sizes']['preload']; ?>"
          data-srcset="<?php echo $icon['sizes']['preload']; ?> 64w,
            <?php echo $icon['sizes']['128w']; ?> 65w,
            <?php echo $icon['sizes']['240w']; ?> 129w,
            <?php echo $icon['sizes']['320w']; ?> 241w
          "
        />
      <?php
      endif;

      // Text
      ?>
      <h3 class="category-heading__text">
        <?php echo $upper; ?><br/>
        <span class="category-heading__text category-heading__text--bigger">
          <?php echo $label; ?>
        </span>
      </h3>
    </div>
  </div>
  <?php
  // Close the wrapping anchor tag if necessary
  if( $linkSelector == 1 ):
  ?>
    </a>
  <?php
  endif;
endforeach;
?>
</div>