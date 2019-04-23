<?php
/**
 * Promotional links component
 *
 * Displays linked blocks for the purpose of promoting particular parts of the
 * website above the univeral footer
 *
 * @var array $content           Component data
 */

$content = array(
  'news' => array(
    'description' => get_field('news_description', 'option'),
    'image' => get_field('news_image', 'option'),
    'link' => get_field('news_link', 'option'),
    'title' => 'Latest News'
  ),
  'resources' => array(
    'description' => get_field('resources_description', 'option'),
    'image' => get_field('resources_image', 'option'),
    'link' => get_field('resources_link', 'option'),
    'title' => 'Resources'
  ),
  'careers' => array(
    'description' => get_field('careers_description', 'option'),
    'image' => get_field('careers_image', 'option'),
    'link' => get_field('careers_link', 'option'),
    'title' => 'Careers'
  )
);
?>
<div class="promotion-links">
  <h3 class="promotion-links__headline">
    Latest News and Opportunities
  </h3>

  <?php
  foreach( $content as $block ):
    $description = $block['description'];
    $background = $block['image'];
    $link = $block['link'];
    $title = $block['title'];
  ?>
    <div class="promotion-links__block">
      <a class="promotion-links__link" href="<?php echo $link; ?>">
        <img class="promotion-links__image lazyload lazyload--blurUp"
          alt="<?php echo $background['alt']; ?>"
          data-sizes="auto"
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
            <?php echo $background['sizes']['1280w']; ?> 1025w
          "
        />
        <div class="promotion-links__conent">
          <h4 class="promotion-links__title">
            <?php echo $title; ?>
          </h4>
          <p class="promotion-links__description">
            <?php echo $description; ?>
          </p>
        </div>
      </a>
    </div>
  <?php
  endforeach;
  ?>
</div>