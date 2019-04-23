<?php
// Favicon meta component

// The favicons are set by division, so that must be obtained first.
if( is_single() ):
  $division = get_query_var('category-prefix');
else:
  $division = get_query_var('division-prefix');
endif;

// Revert the prefix to 'faac' if no division is set for the page
if( $division == '' ):
  $prefix = 'faac';
else:
  $prefix = $division;
endif;

// The prefixed favicon directory
$favicon_dir = get_stylesheet_directory_uri() . '/resources/favicons/' . $prefix;
?>
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $favicon_dir . '/apple-touch-icon.png'; ?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $favicon_dir . '/favicon-32x32.png'; ?>">
<link rel="icon" type="image/png" sizes="16x16"  href="<?php echo $favicon_dir . '/favicon-16x16.png'; ?>">
<link rel="manifest" href="<?php echo $favicon_dir . '/manifest.json'; ?>">
<link rel="mask-icon" href="<?php echo $favicon_dir . '/safari-pinned-tab.svg'; ?>" color="#23282d">
<meta name="theme-color" content="#23282d">
