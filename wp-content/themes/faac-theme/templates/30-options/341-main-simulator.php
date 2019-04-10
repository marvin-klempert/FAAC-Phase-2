<?php
// Sets division-specific values for ACF if the page belongs to a division
$division = get_the_terms( get_the_ID(), 'division' );
$divisionName = $division[0]->name;
if( $divisionName == 'FAAC Commercial' ):
  $divisionPrefix = 'faacCommercial';
elseif( $divisionName == 'FAAC Military' ):
  $divisionPrefix = 'faacMilitary';
elseif( $divisionName == 'MILO Range' ):
  $divisionPrefix = 'miloRange';
elseif( $divisionName == 'Realtime Technologies' ):
  $divisionPrefix = 'rti';
else:
  $divisionPrefix = '';
endif;

if( $divisionPrefix != '' ):
  $cta_pageLink = get_field( $divisionPrefix . '_contactPage', 'option');
  $mainSimulator_phoneNumber = get_field( $divisionPrefix . '_ctaPhone', 'option' );
else:
  $mainSimulator_phoneNumber = get_field( 'cta_phoneNumber', 'option' );
endif;

if( $mainSimulator_page ):
  $post = $mainSimulator_page;
  setup_postdata( $post );
?>
   <div class="main-simulator main-simulator__excerpt-wrapper">
    <h2 class="main-simulator main-simulator__headline"><?php echo $mainSimulator_headline; ?></h2>
    <div class="main-simulator main-simulator__excerpt">
      <?php the_field('simulator_description'); ?>
    </div>
    <div class="main-simulator main-simulator__contact-block">
      <div class="main-simulator main-simulator__button-wrapper">
        <form class="main-simulator main-simulator__form" action="<?php echo $cta_pageLink; ?>">
          <button class="main-simulator main-simulator__button" type="submit"><?php echo $mainSimulator_buttonText ?></button>
        </form>
        <p class="main-simulator main-simulator__text">or call us at <a class="main-simulator main-simulator__link" href="tel:<?php echo $mainSimulator_phoneNumber ?>"><?php echo $mainSimulator_phoneNumber ?></a></p>
      </div>
    </div></div>
   <div class="main-simulator main-simulator--solutions-wrapper" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">

</div>
  <?php wp_reset_postdata(); ?>
<?php endif; ?>
