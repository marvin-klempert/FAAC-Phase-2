<?php // Defines a division class to add to sections
$division = get_the_terms( get_the_ID(), 'division' );

$divisionName = $division[0]->name;
  if( $divisionName == 'FAAC Commercial' ){
    $divisionClass = 'faac-commercial';
  } elseif( $divisionName == 'FAAC Military' ){
    $divisionClass = 'faac-military';
  } elseif( $divisionName == 'MILO Range' ){
    $divisionClass = 'milo-range';
  } elseif( $divisionName == 'Realtime Technologies' ){
    $divisionClass = 'rti';
  } else {
    $divisionClass = '';
  }
?>

<?php while (have_posts()) : the_post(); ?>
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
          <span class="slider slider__text slider__text--bigger"> Job Posting </span>
        </h2>
      </figcaption>
    </section>


  <?php // Breadcrumbs & Flags ?>
  <div class="breadcrumbs-flags breadcrumbs-flags--content-general <?php echo $divisionClass; ?>">
    <?php // Breadcrumbs ?>
    <section class="breadcrumbs breadcrumbs--content-general <?php echo $divisionClass; ?>">
      <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
        <?php if(function_exists('bcn_display'))
          {
              bcn_display();
          }
        ?>
      </div>
    </section>

    <?php //Sector Flag ?>
    <section class="sector-flag sector-flag--content-general <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/20-general/280-sector-flag.php', false, false ));
      ?>
    </section>

    <?php //Division Flag ?>
    <section class="division-flag division-flag--content-general <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/40-divisions/430-division-flag.php', false, false ));
      ?>
    </section>
  </div>

    <div class="content-wrapper content-wrapper--content-general ">
      <div class="content-wrapper content-wrapper-container--content-general ">

        <section class="posts posts--job-listing">
          <div class="body-content body-content__wrapper ">
            <header>
              <h1 class="entry-title"><?php the_title(); ?></h1>
              <h4 class="posts posts__date">
                Published <?php get_template_part('templates/entry-meta'); ?>
              </h4>
            </header>
            <div class="entry-content">
              <?php
                if ( has_post_thumbnail() ):
                  the_post_thumbnail();
                endif;
                the_content();
              ?>
            </div>
            <footer>
              <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
            </footer>
          </div>
        </section>


      </div>
    </div>
  </article>

<?php endwhile; ?>

<?php //Call to Action
  $cta_tagline = get_field('cta_tagline', 'option');
  $cta_buttonText = get_field('cta_buttonText', 'option');
  $cta_pageLink = get_field('cta_pageLink', 'option');
  $cta_phoneNumber = get_field('cta_phoneNumber', 'option');
  $cta_background = get_field('cta_background', 'option');
?>
<section class="call-to-action call-to-action--category-parent <?php echo $divisionClass; ?>">
  <?php
    include ( locate_template( 'templates/50-promotions/520-call-to-action.php', false, false ));
  ?>
</section>
