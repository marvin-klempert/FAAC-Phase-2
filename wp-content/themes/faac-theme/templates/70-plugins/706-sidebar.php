<?php
// Displays the plugin sidebar

if( function_exists('get_field') ):
  $ie_instructions = get_field('milo_sidebar_explorer', 'option');
  $email = get_field('milo_sidebar_email', 'option');
  $phone = get_field('milo_sidebar_phone', 'option');
endif;
?>
<section class="o-browserSidebar">

  <?php
  // Creates a button to reset the auth cookie for this post
  if( $_POST['logoutSubmit'] == "logout" ):
    wp_clear_auth_cookie();
    wp_redirect( get_permalink() );
  endif;
  ?>
  <div class="o-browserSidebar__section">
    <form class="a-supportLogout" action="" method="post">
      <button class="a-supportLogout__button" name="logoutSubmit" value="logout" type="submit">
          Log Out
      </button>
    </form>
  </div>

  <div class="o-browserSidebar__section">
    <div class="a-supportGuides">
      <h3 class="a-supportGuides__headline">
        Support Guides
      </h3>
      <?php
      while( have_rows('milo_sidebar_guides', 'option') ): the_row();
        $label = get_sub_field('label');
        $file = get_sub_field('file');
        ?>
        <a href="<?php echo $file['url']; ?>" target="_blank" download>
          <div class="a-supportGuides__link">
            <?php echo $label; ?>
          </div>
        </a>
        <?php
      endwhile;
      ?>
    </div>
  </div>

  <div class="o-browserSidebar__section">
    <div class="a-supportGuides">
      <h3 class="a-supportGuides__headline">
        Maintenance Guides
      </h3>
      <?php
      while( have_rows('milo_sidebar_maintenance', 'option') ): the_row();
        $label = get_sub_field('label');
        $file = get_sub_field('file');
        ?>
        <a href="<?php echo $file['url']; ?>" target="_blank" download>
          <div class="a-supportGuides__link">
            <?php echo $label; ?>
          </div>
        </a>
        <?php
      endwhile;
      ?>
    </div>
  </div>

  <div class="o-browserSidebar__section">
    <div class="a-contactSupport">
      <h3 class="a-contactSupport__headline">
        Contact Support
      </h3>
      <p class="a-contactSupport__description">
        Contact support by email:
      </p>
      <a class="a-contactSupport__email" href="mailto:<?php echo $email; ?>">
        <?php echo $email; ?>
      </a>
      <?php
      if( $post->ID == (get_field('milo_welcome_page', 'option')->ID) ):
        ?>
        <p class="a-contactSupport__description">
          Contact support by phone:
        </p>
        <p class="a-contactSupport__phone">
          <?php echo $phone; ?>
        </p>
        <?php
      endif;
      ?>
    </div>
  </div>
</section>