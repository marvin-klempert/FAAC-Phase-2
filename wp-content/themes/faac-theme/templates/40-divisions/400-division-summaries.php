<?php
  if( have_rows( $divisionSummary ) ):
    while( have_rows( $divisionSummary ) ): the_row();

    $divisionSummary_division = get_sub_field('divisionSummary_division');
    $division = $divisionSummary_division['value'];
  ?>
    <div class="division-summaries division-summaries__division">
      <a class="division-summaries division-summaries__link" href="<?php echo the_field($division . '_homepage', 'option'); ?>">
        <div class="division-summaries division-summaries__logo" style="background-image: url('<?php echo the_field($division . '_background', 'option'); ?>');">
          <img class="division-summaries division-summaries__image" 
            src="<?php echo the_field($division . '_logo', 'option'); ?>" 
            alt="<?php echo the_field($division . '_name', 'option'); ?>"
          />
        </div>
      </a>
      <div class="division-summaries division-summaries__description">
        <?php echo the_field($division . '_description', 'option') ?>
      </div>
    </div>
  <?php endwhile; ?>
<?php endif; ?>