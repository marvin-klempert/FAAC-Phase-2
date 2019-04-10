<?php
// Basic page template routing. Only applies to 'Default Template'
if( is_front_page() ):
  get_template_part( 'page-templates/homepage' );
elseif( is_home() || is_archive() || is_paged() ):
  get_template_part( 'page-templates/blog-archive' );
else:
  get_template_part( 'page-templates/general-content' );
endif;
?>
