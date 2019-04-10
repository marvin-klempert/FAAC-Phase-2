<div class="sidebar sidebar__heading">
 <div class="sidebar sidebar__wrapper">
  <?php if( !empty( $linkBlock_icon ) ): ?>
    <img class="sidebar sidebar__icon"
      src="<?php echo $linkBlock_icon; ?>"
      alt="<?php echo $linkBlock_title; ?>"
    >
  <?php endif; ?>
  <h3 class="sidebar sidebar__title">
    <?php echo $linkBlock_title; ?>
  </h3>
  </div>
</div>
<nav class="sidebar sidebar__links">
  <?php if( $linkBlock_list ): ?>
    <ul class="sidebar sidebar__list">
    <?php foreach( $linkBlock_list as $postObject ): // variable must NOT be called $post (IMPORTANT) ?>
      <li class="sidebar sidebar__item">
        <a class="sidebar sidebar__link" href="<?php echo wp_get_attachment_url( $postObject->ID ); ?>">
          <?php echo get_the_title( $postObject->ID ); ?>
        </a>
      </li>
    <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</nav>
