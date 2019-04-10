<?php get_template_part('templates/page', 'header'); ?>

  <?php $headerBackground = get_field('faac_postHeader', 'option'); ?>
  <section class="post-header">
    <img class="post-header post-header__image"
      src="<?php echo $headerBackground['url']; ?>"
      alt="<?php echo $headerBackground['alt']; ?>"
    />
    <figcaption class="slider slider__caption">
      <h2 class="slider slider__text">
        <br>
        <span class="slider slider__text slider__text--bigger">
          Search Results
        </span>
      </h2>
    </figcaption>
  </section>

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

<div class="content-wrapper content-wrapper--content-general ">
  <div class="content-wrapper content-wrapper-container--content-general ">

    <?php if (!have_posts()) : ?>
      <div class="alert alert-warning">
        <?php _e('Sorry, no results were found.', 'sage'); ?>
      </div>
      <?php get_search_form(); ?>
    <?php endif; ?>

    <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('templates/content', 'search'); ?>
    <?php endwhile; ?>

  </div>
</div>

<?php the_posts_navigation(); ?>
