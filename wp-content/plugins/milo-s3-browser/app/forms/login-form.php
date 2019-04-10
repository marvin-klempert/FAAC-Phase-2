<?php
function milo_password_form() {
  global $post;
  $post_slug = $post->post_name;
  if(
    strpos(get_page_template_slug(), 'browser-dashboard') ||
    strpos(get_page_template_slug(), 'browser-single') ||
    ($post_slug ==
      'milo-content' ||
      'milo-software' ||
      'milo-videos'
    )
  ):
    $checkLabel = get_field('milo_login_tosLabel', 'option');
    $checkLink = get_field('milo_login_tosPage', 'option');
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form class="m-browserForm protected-post-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post"><label class="m-browserForm__label m-browserForm__label--password" for="' . $label . '">' . __( "Password" ) . ' </label><input class="m-browserForm__pass" name="post_password" id="' . $label . '" placeholder="Enter your password" type="password" size="20" /><input class="m-browserForm__checkbox" name="tos_checkbox" id="tos-checkbox" type="checkbox"><label class="m-browserForm__label m-browserForm__label--check" for="tos-checkbox">I agree to the <a class="m-browserForm__link" href="' . $checkLink . '" target="_blank">' . $checkLabel . '</a></label><input class="m-browserForm__button --inactive" type="submit" name="Submit" value="' . esc_attr__( "Sign In" ) . '" />
    </form>
    ';
  else:
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form class="protected-post-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    ' . __( "To view this protected post, enter the password below:" ) . '
    <label for="' . $label . '">' . __( "Password:" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" /><input type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" />
    </form>
    ';
  endif;
  return $o;
}
add_filter( 'the_password_form', 'milo_password_form');