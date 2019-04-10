<div class="body-content body-content__wrapper">
<?php
  while( have_rows( $resourceGrid ) ): the_row();
    $heading = get_sub_field('category_heading');
    $taxonomy = get_sub_field('category_selector');

  //Sets the query term based on the taxonomy choice
  if( $taxonomy['value'] == 'division' ):
    $term = get_sub_field('category_division');
  else:
    $term = get_sub_field('category_sector');
  endif;
?>
<div class="body-content body-content__resources">
<h3 class="body-content body-content__heading">
  <?php echo $heading; ?>
</h3>
<?php
  $args = array(
      'post_type' => 'attachment',
      'post_status' => 'inherit',
      'nopaging' => true,
      'tax_query' => array(
          array(
              'taxonomy' => $taxonomy['value'],
              'field'    => 'slug',
              'operator' => 'IN',
              'terms'    => array(
                  $term->slug
              )
          ),
      ),
  );
  $resources = new WP_Query( $args );

  if( $resources->have_posts() ):
    while( $resources->have_posts() ):
      $resources->the_post();
      $resource_id = get_the_ID();
        $resource_link = wp_get_attachment_url($resource_id);
        $resource_src = wp_get_attachment_image_src( $resource_id, 'thumbnail', false, '' );
  ?>
    <div class="body-content body-content__item">
      <a class="body-content body-content__link" href="<?php echo $resource_link; ?>" download >
        <img src="<?php echo $resource_src[0]; ?>" width="<?php echo $resource_src[1]; ?>" />
        <br />
        <?php the_title(); ?>
      </a>
    </div>
<?php
    endwhile;
  endif;
  wp_reset_postdata();
?>
</div>
<?php
  endwhile;
?>
</div>
