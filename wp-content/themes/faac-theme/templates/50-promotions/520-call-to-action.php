<?php // If the CTA is on a division page, changes the button's linked page to the contact page set for that division
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

// Sets division-specific values for ACF if the page belongs to a division
if( $divisionPrefix != '' ):
  $pageLink = get_field( $divisionPrefix . '_contactPage', 'option');
  $cta_background = get_field( $divisionPrefix . '_ctaBackground', 'option');
  $cta_phoneNumber = get_field( $divisionPrefix . '_ctaPhone', 'option' );
  $cta_pageLink = get_field( $divisionPrefix . '_ctaPage', 'option' );
endif;

?>

<div class="call-to-action call-to-action__wrapper" style="background-image: url('<?php echo $cta_background['sizes']['w1360'] ?>');">
  <h2 class="call-to-action call-to-action__headline">
    <?php echo $cta_tagline ?>
  </h2>
    <form class="call-to-action call-to-action__form" action="<?php echo $cta_pageLink ?>">
      <button class="call-to-action call-to-action__button" type="submit">
        <?php echo $cta_buttonText ?>
      </button>
    </form>
  <p class="call-to-action call-to-action__text">
    or call us at <a class="call-to-action call-to-action__link" href="tel:<?php echo $cta_phoneNumber ?>"><?php echo $cta_phoneNumber ?></a>
  </p>
</div>
