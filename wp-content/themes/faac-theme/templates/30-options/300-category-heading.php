<?php
  if( have_rows( $heading ) ):
    while( have_rows( $heading ) ) : the_row();

      $heading_select = get_sub_field('heading_select');
        //Grabs background image based on selection
        $heading_background = get_field($heading_select['value'] . '_headingBackground', 'option');
      $heading_icon = get_sub_field('heading_icon');
        $icon = get_field($heading_icon['value'] . '_icon', 'option') ;
      $heading_upperText = get_sub_field('heading_upperText');
      $heading_linkSelector = get_sub_field('heading_linkSelector');
      $heading_linkedPage = get_sub_field('heading_linkedPage');
      $heading_imageSelector = get_sub_field('heading_imageSelector');
      $heading_image = get_sub_field('heading_image');
?>
  <?php if( $heading_linkSelector == 1 ): ?>
    <a href="<?php echo $heading_linkedPage ?>">
  <?php endif ?>
      <div class="category-heading category-heading__block"
        style="background-image: url('<?php
          if( $heading_imageSelector == true ):
            echo $heading_image['sizes']['w1100'];
          else:
            echo $heading_background['sizes']['w1100'];
          endif;
          ?>');" >
        <?php if( $heading_icon['value'] != "none" ): ?>
          <img class="category-heading category-heading__icon"
            src="<?php echo $icon['url']; ?>"
            alt="<?php echo $icon['alt']; ?>"
           />
        <?php endif; ?>
          <h3 class="category-heading category-heading__text">
            <?php echo $heading_upperText ?><br />
            <span class="category-heading category-heading__text category-heading__text--bigger">
              <?php echo $heading_select['label']; ?>
            </span>
          </h3>
      </div>
  <?php if( $heading_linkSelector == 1 ): ?>
    </a>
  <?php endif;
    endwhile;
  endif;
?>
