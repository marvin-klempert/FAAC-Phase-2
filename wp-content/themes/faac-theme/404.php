<?php get_template_part('templates/page', 'header'); ?>

<?php $headerBackground = get_field('faac_postHeader', 'option'); ?>

<article <?php post_class(); ?>>
  <section class="post-header">
    <img class="post-header post-header__image"
      src="<?php echo $headerBackground['url']; ?>"
      alt="<?php echo $headerBackground['alt']; ?>"
    />
    <figcaption class="slider slider__caption">
      <h2 class="slider slider__text">
        <br />
        <span class="slider slider__text slider__text--bigger"> Oops... </span>
      </h2>
    </figcaption>
  </section>

  <div class="content-wrapper content-wrapper--content-general ">
    <div class="content-wrapper content-wrapper-container--content-general ">

      <section class="body-content body-content__wrapper">

        <div class="alert alert-warning">
          <?php _e('Sorry, but the page you were trying to view does not exist.', 'sage'); ?>
        </div>

      </section>

    </div>
  </div>

</article>

<?php // Call to Action
  if( get_field('cta_tagline', 'option') != '' ):
    $cta_tagline = get_field('cta_tagline', 'option');
    $cta_buttonText = get_field('cta_buttonText', 'option');
    $cta_phoneNumber = get_field('cta_phoneNumber', 'option');
    $cta_background = get_field('cta_background', 'option');
?>
  <section class="call-to-action call-to-action--content-general <?php echo $divisionClass; ?>">
    <?php
      include ( locate_template( 'templates/50-promotions/520-call-to-action.php', false, false ));
    ?>
  </section>
<?php endif; ?>
