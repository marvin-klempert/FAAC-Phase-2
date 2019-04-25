<?php
/**
 * Contact info widget
 *
 * @var array $social       Social media content
 * @var array $contact      Contact information content
 * @var array $parent       Parent company information
 */
$social = get_query_var( 'social' );
$contact = get_query_var( 'contact' );
$parent = get_query_var( 'parent' );
?>
<section class="contact-widget">
  <?php //Social Profiles
  if( $social ): ?>
    <div class="contact-widget__social">
      <?php
      foreach( $social as $platform ):
        $icon = $platform['socialMedia_icon'];
        $link = $platform['socialMedia_link'];
      ?>
        <a class="contact-widget__social-link" href="<?php echo $link ?>" target="_blank">
          <img class="contact-widget__social-icon"
            src="<?php echo $icon['url'] ?>"
            alt="<?php echo $icon['alt'] ?>"
          />
        </a>
      <?php
      endforeach;
      ?>
    </div>
  <?php
  endif;

  //Contact Info blocks
  if( $contact ):
    $miTitle = $contact['michiganTitle'];
    $miLink = $contact['michiganLink'];
    $miAddress = $contact['michiganAddress'];
    $numTitle = $contact['numberTitle'];
    $numPhone = $contact['numberPhone'];
    $numFax = $contact['numberFax'];
    $outTitle = $contact['outsideTitle'];
    $outLink = $contact['outsideLink'];
    $outAddress = $contact['outsideAddress'];
  ?>
    <div class="contact-widget__contact">
      <div class="contact-widget__contact-michigan">
        <a class="contact-widget__contact-link" href="<?php echo $miLink; ?>">
          <h5 class="contact-widget__contact-header">
            <?php echo $miTitle; ?>
          </h5>
        </a>
        <p class="contact-widget__contact-text">
          <?php echo $miAddress; ?>
        </p>
      </div>

      <div class="contact-widget__contact-phone">
        <h5 class="contact-widget__contact-header">
          <?php echo $numTitle; ?>
        </h5>
        <p class="contact-widget__contact-text">
          Phone: <a class="contact-widget__contact-link" href="tel:<?php echo $numPhone; ?>"><?php echo $numPhone; ?></a>
        </p>
        <p class="contact-widget__contact-text">
          Fax: <?php echo $numFax; ?>
        </p>
      </div>

      <div class="contact-widget__contact-outside">
        <a class="contact-widget__contact-link" href="<?php echo $outLink; ?>">
          <h5 class="contact-widget__contact-header">
          <?php echo $outTitle; ?>
          </h5>
        </a>
        <p class="contact-widget__contact-text">
          <?php echo $outAddress; ?>
        </p>
      </div>
    </div>
  <?php
  endif;

  //Parent company info
  if( $parent ):
    $parentLogo = $parent['logo'];
    $parentLink = $parent['link'];
  ?>
    <div class="contact-widget__company">
      <p class="contact-widget__company-upper-text">
        FAAC is an
      </p>
      <a class="contact-widget__company-link" href="<?php echo $parentLink; ?>"  target="_blank">
        <img class="contact-widget__company-logo"
          src="<?php echo $parentLogo['sizes']['128w'] ?>"
          alt="<?php echo $parentLogo['alt'] ?>"
        />
      </a>
      <p class="contact-widget__company-lower-text">
        company
      </p>
    </div>
  <?php
  endif;
  ?>
</section>