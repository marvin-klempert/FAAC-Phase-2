<section class="contact-widget">

  <?php //Social Profiles

  if( have_rows('socialMedia', $acfw) ): ?>
  <div class="contact-widget contact-widget__social">
    <?php while( have_rows('socialMedia', $acfw) ): the_row();

      $socialMedia_icon = get_sub_field('socialMedia_icon', $acfw);
      $socialMedia_link = get_sub_field('socialMedia_link', $acfw);

    ?>
    <a class="contact-widget contact-widget__social-link" href="<?php echo $socialMedia_link ?>" target="_blank">
      <img class="contact-widget contact-widget__social-icon"
        src="<?php echo $socialMedia_icon['url'] ?>"
        alt="<?php echo $socialMedia_icon['alt'] ?>"
      />
    </a>
    <?php endwhile; ?>
  </div>
  <?php endif; ?>

  <?php //Contact Info blocks

    //Michigan location variables
    $contactBlocks_michiganTitle = get_field('contactBlocks_michiganTitle', $acfw);
    $contactBlocks_michiganLink = get_field('contactBlocks_michiganLink', $acfw);
    $contactBlocks_michiganAddress = get_field('contactBlocks_michiganAddress', $acfw);

    //Contact number variables
    $contactBlocks_numberTitle = get_field('contactBlocks_numberTitle', $acfw);
    $contactBlocks_numberPhone = get_field('contactBlocks_numberPhone', $acfw);
    $contactBlocks_numberFax = get_field('contactBlocks_numberFax', $acfw);

    //Outside location variables
    $contactBlocks_outsideTitle = get_field('contactBlocks_outsideTitle', $acfw);
    $contactBlocks_outsideLink = get_field('contactBlocks_outsideLink', $acfw);
    $contactBlocks_outsideAddress = get_field('contactBlocks_outsideAddress', $acfw);

  ?>

  <div class="contact-widget contact-widget__contact">
    <div class="contact-widget contact-widget__contact-michigan">
      <a class="contact-widget contact-widget__contact-link" href="<?php echo $contactBlocks_michiganLink ?>">
        <h5 class="contact-widget contact-widget__contact-header">
          <?php echo $contactBlocks_michiganTitle ?>
        </h5>
      </a>
      <p class="contact-widget contact-widget__contact-text">
        <?php echo $contactBlocks_michiganAddress ?>
      </p>
    </div>

    <div class="contact-widget contact-widget__contact-phone">
      <h5 class="contact-widget contact-widget__contact-header">
        <?php echo $contactBlocks_numberTitle ?>
      </h5>
      <p class="contact-widget contact-widget__contact-text">
        Phone: <a class="contact-widget contact-widget__contact-link" href="tel:<?php echo $contactBlocks_numberPhone ?>"><?= $contactBlocks_numberPhone ?></a>
      </p>
      <p class="contact-widget contact-widget__contact-text">
        Fax: <?php echo $contactBlocks_numberFax ?>
      </p>
    </div>

    <div class="contact-widget contact-widget__contact-outside">
      <a class="contact-widget contact-widget__contact-link" href="<?php echo $contactBlocks_outsideLink ?>">
        <h5 class="contact-widget contact-widget__contact-header">
          <?php echo $contactBlocks_outsideTitle ?>
        </h5>
      </a>
      <p class="contact-widget contact-widget__contact-text">
        <?php echo $contactBlocks_outsideAddress ?>
      </p>
    </div>
  </div>

  <?php //Parent company info

    $parentCo_logo = get_field('parentCo_logo', $acfw);
    $parentCo_link = get_field('parentCo_link', $acfw);

  ?>
  <div class="contact-widget contact-widget__company">
    <p class="contact-widget contact-widget__company-upper-text">
      FAAC is an
    </p>
    <a class="contact-widget contact-widget__company-link" href="<?php echo $parentCo_link ?>"  target="_blank">
      <img class="contact-widget contact-widget__company-logo"
        src="<?php echo $parentCo_logo['url'] ?>"
        alt="<?php echo $parentCo_logo['alt'] ?>"
      />
    </a>
    <p class="contact-widget contact-widget__company-lower-text">
      company
    </p>
  </div>

</section>
