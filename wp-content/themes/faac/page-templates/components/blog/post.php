<?php
/**
 * Blog post component
 *
 * @var string $category      The division to use for post branding
 */

$category = get_query_var( 'category-prefix' );
?>
<div class="blog-post blog-post--<?php echo $category; ?>">
  <header class="blog-post__header">
    <h1 class="blog-post__title">
      <?php the_title(); ?>
    </h1>
    <h4 class="blog-post__date">
      Published <time class="updated" datetime="<?php echo get_post_time('c', true); ?>"><?php echo get_the_date(); ?></time>
    </h4>
  </header>
  <div class="blog-post__content">
    <?php
      if ( has_post_thumbnail() ):
        the_post_thumbnail();
      endif;

      the_content();
    ?>
  </div>
  <footer class="blog-post__footer">
    <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'fwd'), 'after' => '</p></nav>']); ?>
  </footer>
</div>