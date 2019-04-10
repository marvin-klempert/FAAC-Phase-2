<?php // Defines a division class to add to sections
$category = get_the_terms( get_the_ID(), 'category' );

$categoryName = $category[0]->name;
  if( $categoryName == 'FAAC Commercial' ){
    $categoryName = 'faac-commercial';
    $categoryPrefix = 'faacCommercial';
  } elseif( $categoryName == 'FAAC Military' ){
    $categoryName = 'faac-military';
    $categpryPrefix = 'faacMilitary';
  } elseif( $categoryName == 'MILO Range' ){
    $categoryName = 'milo-range';
    $categoryPrefix = 'miloRange';
  } elseif( $categoryName == 'Realtime Technologies' ){
    $categoryName = 'rti';
    $categoryPrefix = 'rti';
  } else {
    $categoryName = '';
    $categoryPrefix = '';
  }
?>

<?php while (have_posts()) : the_post(); ?>
  <?php
    if( $categoryPrefix == '' ):
      $headerBackground = get_field('faac_postHeader', 'option');
    else:
      $headerBackground = get_field($categoryPrefix . '_background', 'option');
    endif;
    ?>

  <article <?php post_class(); ?>>
    <section class="post-header">
      <?php
        if( $categoryPrefix == ''):
      ?>
        <img class="post-header post-header__image"
          src="<?php echo $headerBackground['url']; ?>"
          alt="<?php echo $headerBackground['alt']; ?>"
        />
      <?php
        else:
      ?>
        <img class="post-header post-header__image"
          src="<?php echo $headerBackground; ?>"
          alt="<?php echo $categoryName; ?>"
        />
      <?php
        endif;
      ?>
      <figcaption class="slider slider__caption">
        <h2 class="slider slider__text">
          <br />
          <span class="slider slider__text slider__text--bigger"> News </span>
        </h2>
      </figcaption>
    </section>


    <?php // Breadcrumbs & Flags ?>
    <div class="breadcrumbs-flags breadcrumbs-flags--simulator-child <?php echo $categoryName; ?>">
      <?php // Breadcrumbs ?>
      <section class="breadcrumbs breadcrumbs--simulator-child <?php echo $categoryName; ?>">
        <div class="breadcrumbs <?php echo $categoryName; ?>" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php if(function_exists('bcn_display'))
            {
                bcn_display();
            }?>
        </div>
      </section>

      <?php //Sector Flag ?>
      <section class="sector-flag sector-flag--simulator-child <?php echo $categoryName; ?>">
        <?php
          include ( locate_template( 'templates/20-general/280-sector-flag.php', false, false ));
        ?>
      </section>

      <?php //Division Flag ?>
      <section class="division-flag division-flag--simulator-child <?php echo $categoryName; ?>">
        <?php
          include ( locate_template( 'templates/40-divisions/430-division-flag.php', false, false ));
        ?>
      </section>
    </div>

    <div class="content-wrapper content-wrapper--content-general <?php echo $categoryName; ?>">
      <div class="content-wrapper content-wrapper-container--content-general <?php echo $categoryName; ?>">

        <section class="posts posts--content-news <?php echo $categoryName; ?>">
          <div class="body-content body-content__wrapper <?php echo $categoryName; ?>">
            <header class="<?php echo $categoryName; ?>">
              <h1 class="entry-title <?php echo $categoryName; ?>"><?php the_title(); ?></h1>
              <h4 class="posts posts__date <?php echo $categoryName; ?>">
                Published <?php get_template_part('templates/entry-meta'); ?>
              </h4>
            </header>
            <div class="entry-content <?php echo $categoryName; ?>">
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

        <section class="sidebar sidebar--content-news <?php echo $categoryName; ?>">
          <div class="sidebar sidebar__recent-news <?php echo $categoryName; ?>">
            <h3 class="sidebar sidebar__title <?php echo $categoryName; ?>">
              Recent News
            </h3>
            <nav class="sidebar sidebar__links <?php echo $categoryName; ?>">
              <ul class="sidebar sidebar__list <?php echo $categoryName; ?>">
                <?php
                  $args = array( 'numberposts' => '3', 'tax_query' => array(
                    array(
                      'taxonomy' => 'post_format',
                      'field' => 'slug',
                      'terms' => 'post-format-aside',
                      'operator' => 'NOT IN'
                    ),
                    array(
                      'taxonomy' => 'post_format',
                      'field' => 'slug',
                      'terms' => 'post-format-image',
                      'operator' => 'NOT IN'
                    )
                  ));
                  $recent_posts = wp_get_recent_posts( $args );
                  foreach( $recent_posts as $recent ):
                ?>
                  <li class="sidebar sidebar__item <?php echo $categoryName; ?>">
                    <a class="sidebar sidebar__link <?php echo $categoryName; ?>" href="<?php echo get_permalink($recent["ID"]); ?>" target="_blank">
                      <?php echo $recent["post_title"]; ?>
                    </a>
                  </li>
                <?php
                  endforeach;
                  wp_reset_query();
                ?>
              </ul>
            </nav>
          </div>

          <div class="sidebar sidebar__categories <?php echo $categoryName; ?>">
            <h3 class="sidebar sidebar__title <?php echo $categoryName; ?>">
              Categories
            </h3>
            <nav class="sidebar sidebar__links <?php echo $categoryName; ?>">
              <ul class="sidebar sidebar__list <?php echo $categoryName; ?>">
                <?php
                  wp_list_categories(
                    array(
                      'orderby' => 'name',
                      'title_li' => '',
                      'exclude' => array(1) // Excludes 'Uncategorized'
                    )
                  );
                ?>
              </ul>
            </nav>
          </div>
        </section><!-- /.sidebar -->
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
<section class="call-to-action call-to-action--category-parent <?php echo $categoryName; ?>">
  <?php
    include ( locate_template( 'templates/50-promotions/520-call-to-action.php', false, false ));
  ?>
</section>
