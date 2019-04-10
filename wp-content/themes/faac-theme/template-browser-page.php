<?php
/**
 * Template Name: Browser Page
 */

while (have_posts()) : the_post();
if( $divisionPrefix == ''):
  $headerBackground = get_field('faac_postHeader', 'option');
else:
  $headerBackground = get_field($divisionPrefix . '_background', 'option');
endif;

get_template_part('templates/page', 'header');
?>
<article <?php post_class(); ?>>
  <?php // Slider area
    if( get_field('slider') != '' ):
      $slider = get_field('slider');
        $slider_gallery = $slider['slider_gallery'];
        $slider_category = $slider['slider_category'];
        $slider_upperText = $slider['slider_upperText'];
        $slider_lowerText = $slider['slider_lowerText'];
  ?>
    <section class="slider slider--division-internal <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/10-sliders/100-basic-slider.php', false, false ));
      ?>
    </section>
  <?php endif; ?>

  <div class="browser-body">

    <?php
    // If the user is an admin or has entered the password, skip the form
    if(
      !current_user_can('administrator') &&
      post_password_required()
    ):
      include( locate_template( 'templates/70-plugins/704-login.php', false, false ) );
    else:
      include( locate_template( 'templates/70-plugins/703-directory.php', false, false ) );
      include( locate_template( 'templates/70-plugins/706-sidebar.php', false, false ) );
    endif;
    ?>

  </div>

</article>
<?php
endwhile;
?>
