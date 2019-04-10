<?php
while( have_rows( $videoThumbnails ) ): the_row();
  $headline = get_sub_field('videoThumbnails_headline');
  $description = get_sub_field('videoThumbnails_subject');

  $type = get_sub_field('videoThumbnails_type');
  $name = get_sub_field('videoThumbnails_name');
    // if the type is a user, append /videos to the URL
    if( $type['value'] == 'videos' ):
      $name .= '/videos';
    endif;

  $request = '/' . $type['value'] . '/' . $name;
  $request_id = get_the_ID();
  $transient_id = 'vimeo_' . $request_id;

  // Fetches cached vimeo request data, if it exists
  if( false === ( ${'vimeo_' . $request_id} = get_transient( $transient_id ) ) ):
    // It wasn't there, so regenerate the data and save the transient
    $response = $vimeo_lib->request(
      $request,
      array(
        'fields' => 'name,link,pictures.sizes',
        'direction' => 'desc',
        'per_page' => 100,
        'sort' => 'date'
       ),
       'GET'
     );
    set_transient( $transient_id, $response, 12 * HOUR_IN_SECONDS );
  endif;
  $response = get_transient( $transient_id );

  // Var dump for testing
  // var_dump($response['body']);

  // Grabs total video count for the grid's loop and resets the counter
  $totalVideos = $response['body']['total'];
  $videoCounter = 0;
?>
  <h2 class="video-grid video-grid__headline">
    <?php echo $headline; ?>
  </h2>
  <div class="video-grid video-grid__description">
    <?php echo $description; ?>
  </div>

  <?php
    while( $videoCounter < $totalVideos ):
      $title = $response['body']['data'][$videoCounter]['name'];
      $videoURL = $response['body']['data'][$videoCounter]['link'];
      $thumbURL = $response['body']['data'][$videoCounter]['pictures']['sizes'][2]['link'];
  ?>
    <a class="popup-vimeo" href="<?php echo $videoURL; ?>">
      <img class="video-grid video-grid__thumbnail"
        src="<?php echo $thumbURL; ?>"
        alt="<?php echo $title; ?>"
      />
      <h3 class="video-grid video-grid__video-title">
        <?php echo $title; ?>
      </h3>
    </a>
  <?php
    $videoCounter++;
    endwhile;
  ?>
<?php endwhile; ?>
