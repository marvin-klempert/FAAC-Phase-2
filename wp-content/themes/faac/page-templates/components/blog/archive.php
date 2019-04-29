<?php
/**
 * Blog archive component
 *
 * @var object $query     The query object for the archive
 */

$division = get_division_class();
$query = get_query_var( 'query' );
?>
<div class="posts<?php if($division){echo ' posts--' . $division;}?>">
  <?php
  while( $query->have_posts() ): $query->the_post();
  ?>
    <div class="posts__item">
      <div class="posts__heading">
        <a class="posts__link" href="<?php the_permalink(); ?>">
          <h2 class="posts__title">
            <?php the_title(); ?>
          </h2>
        </a>
        <h4 class="posts__date">
          Published on <?php the_date( 'F j, Y' ); ?>
        </h4>
        <?php
        if( has_post_thumbnail() ):
        ?>
          <img class="posts__image lazyload lazyload--blurUp"
            alt="<?php the_title(); ?>" data-sizes="auto"
            data-src="<?php the_post_thumbnail_url('preload'); ?>"
            data-srcset="<?php the_post_thumbnail_url('preload'); ?> 64w,
              <?php the_post_thumbnail_url('128w'); ?> 65w,
              <?php the_post_thumbnail_url('240w'); ?> 129w,
              <?php the_post_thumbnail_url('320w'); ?> 241w,
              <?php the_post_thumbnail_url('375w'); ?> 321w,
              <?php the_post_thumbnail_url('480w'); ?> 376w,
              <?php the_post_thumbnail_url('540w'); ?> 481w,
              <?php the_post_thumbnail_url('640w'); ?> 541w,
              <?php the_post_thumbnail_url('720w'); ?> 641w,
              <?php the_post_thumbnail_url('768w'); ?> 721w,
              <?php the_post_thumbnail_url('800w'); ?> 769w,
              <?php the_post_thumbnail_url('960w'); ?> 801w,
              <?php the_post_thumbnail_url('1024w'); ?> 961w,
              <?php the_post_thumbnail_url('1280w'); ?> 1025w,
              <?php the_post_thumbnail_url('1366w'); ?> 1281w,
              <?php the_post_thumbnail_url('1440w'); ?> 1367w,
              <?php the_post_thumbnail_url('1600w'); ?> 1441w,
              <?php the_post_thumbnail_url('1920w'); ?> 1601w,
              <?php the_post_thumbnail_url('2560w'); ?> 1921w,
              <?php the_post_thumbnail_url('3840w'); ?> 2561w,
            "
          />
        <?php
        endif;
        ?>
        <div class="posts__content">
          <?php echo wp_trim_excerpt(); ?>
        </div>
      </div>
    </div>
  <?php
  endwhile;
  ?>
</div>