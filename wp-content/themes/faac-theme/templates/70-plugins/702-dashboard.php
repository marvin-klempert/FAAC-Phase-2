<?php
// Displays a "welcome" area and dashboard for the browser interface

if( function_exists('get_field') ):
  $intro = get_field('milo_welcome_intro');
  $lower = get_field('milo_welcome_lower');
endif;
?>
<section class="o-browserDashboard">
  <div class="o-browserDashboard__intro">
    <?php echo $intro; ?>
  </div>
  <div class="o-browserDashboard__grid">
    <?php
    while( have_rows('milo_welcome_grid') ): the_row();
      if( get_row_layout() == 'full-width' ):
        $browser = get_sub_field('browser');
          $browserLink = get_permalink($browser);
          $browserImage = get_field('milo_bucket_preview', $browser);
        $button = get_sub_field('button');
      ?>
        <div class="m-gridCell m-gridCell--full">
          <img class="m-gridCell__background" src="<?php echo $browserImage['url']; ?>" />
          <div class="m-gridCell__content">
            <h3 class="m-gridCell__title">
              <?php
              while( have_rows('name') ): the_row();
                if( get_row_layout() == 'normal' ):
                  the_sub_field('text');
                elseif( get_row_layout() == 'emphasized'):
                ?>
                  <span class="m-gridCell__title m-gridCell__title--emphasized">
                    <?php the_sub_field('text'); ?>
                  </span>
                <?php
                endif;
              endwhile;
              ?>
            </h3>
            <a href="<?php echo $browserLink; ?>">
              <div class="m-gridCell__link">
                <?php echo $button; ?>
              </div>
            </a>
          </div>
        </div>
      <?php
      elseif( get_row_layout() == 'two-up'):
        $browser_01 = get_sub_field('browser_01');
          $browserLink_01 = get_permalink($browser_01);
          $browserImage_01 = get_field('milo_bucket_preview', $browser_01);
        $browser_02 = get_sub_field('browser_02');
          $browserLink_02 = get_permalink($browser_02);
          $browserImage_02 = get_field('milo_bucket_preview', $browser_02);
        $button_01 = get_sub_field('button_01');
        $button_02 = get_sub_field('button_02');
      ?>
        <div class="m-gridCell m-gridCell--half">
          <img class="m-gridCell__background" src="<?php echo $browserImage_01['url']; ?>" />
          <div class="m-gridCell__content">
            <h3 class="m-gridCell__title">
              <?php
              while( have_rows('name_01') ): the_row();
                if( get_row_layout() == 'normal' ):
                  the_sub_field('text');
                elseif( get_row_layout() == 'emphasized'):
                ?>
                  <span class="m-gridCell__title m-gridCell__title--emphasized">
                    <?php the_sub_field('text'); ?>
                  </span>
                <?php
                echo '<br/>';
                endif;
              endwhile;
              ?>
            </h3>
            <a href="<?php echo $browserLink_01; ?>">
              <div class="m-gridCell__link">
                <?php echo $button_01; ?>
              </div>
            </a>
          </div>
        </div>
        <div class="m-gridCell m-gridCell--half">
          <img class="m-gridCell__background" src="<?php echo $browserImage_02['url']; ?>" />
          <div class="m-gridCell__content">
            <h3 class="m-gridCell__title">
              <?php
              while( have_rows('name_02') ): the_row();
                if( get_row_layout() == 'normal' ):
                  the_sub_field('text');
                ?>
                  <br/>
                <?php
                elseif( get_row_layout() == 'emphasized'):
                ?>
                  <span class="m-gridCell__title m-gridCell__title--emphasized">
                    <?php the_sub_field('text'); ?>
                  </span>
                  <br/>
                <?php
                endif;
              endwhile;
              ?>
            </h3>
            <a href="<?php echo $browserLink_02; ?>">
              <div class="m-gridCell__link">
                <?php echo $button_02; ?>
              </div>
            </a>
          </div>
        </div>
      <?php
      endif;
    endwhile;
    ?>
  </div>
  <div class="o-browserDashboard__lower">
    <?php echo $lower; ?>
  </div>
</section>

<dialog id="milo-loading-modal" class="o-browserDashboard__dialog">
  <div class="o-browserDashboard__spinner">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
</dialog>
