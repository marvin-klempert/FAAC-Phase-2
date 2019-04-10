<div class="body-content body-content__wrapper">
<?php
  while( have_rows( $resourceGrid ) ): the_row();
    $heading = get_sub_field('category_heading');
    $sector = get_sub_field('category_sector');

  // Focuses the query based on the division of the page


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
        'relation' => 'AND',
        array(
          'taxonomy' => 'sector',
          'field'    => 'slug',
          'operator' => 'IN',
          'terms'    => array(
            $sector->slug
          )
        ),
        array(
          'taxonomy' => 'division',
          'field'    => 'name',
          'operator' => 'IN',
          'terms'    => array(
             $divisionName
          )
        )
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
