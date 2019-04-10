<h2 class="division-feature division-feature__headline"><?php echo $divisionFeature_headline ?></h2>

<?php
  // overrides $post
  $post = $divisionFeature_solution;
  setup_postdata( $post );

  $simulator_thumbnail = get_field('simulator_thumbnail');
?>
<div class="division-feature division-feature__feature" style="background-image: url('<?php echo $simulator_thumbnail['sizes']['w1100']; ?>')">
  <a class="division-feature division-feature__link" href="<?php the_permalink(); ?>">
    <h3 class="division-feature division-feature__headline"><?php the_title(); ?></h3>
  </a>
</div>
<?php wp_reset_postdata(); ?>

<?php
  // overrides $post
  $post = $divisionFeature_simulator;
  setup_postdata( $post );

  $simulator_thumbnail = get_field('simulator_thumbnail');
?>
<div class="division-feature division-feature__feature" style="background-image: url('<?php echo $simulator_thumbnail['sizes']['w1100']; ?>')">
  <a class="division-feature division-feature__link" href="<?php the_permalink(); ?>">
    <h3 class="division-feature division-feature__headline"><?php the_title(); ?></h3>
  </a>
</div>
<?php wp_reset_postdata(); ?>
