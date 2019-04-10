<?php

if( function_exists('acf_add_local_field_group') ):

  // 000 - Meta Boxes
  require('000-meta/010-simulator-solution-special-options.php');
  require('000-meta/020-testimonial-background.php');

  // 100 - Sliders
  require('100-sliders/100-basic-slider.php');
  require('100-sliders/110-dynamic-slider.php');

  // 200 - General Content Modules
  require('200-general/200-centered-content.php');
  require('200-general/210-columned-content.php');
  require('200-general/220-linked-photo-grid.php');
  require('200-general/221-division-logo-grid.php');
  require('200-general/230-inner-feature.php');
  require('200-general/240-article.php');
  require('200-general/250-media-block.php');
  require('200-general/260-link-block-feature.php');
  require('200-general/270-feature-text-block.php');

  // 300 - Simulator & Solution Modules
  require('300-simulators-solutions/300-category-heading.php');
  require('300-simulators-solutions/310-category-row.php');
  require('300-simulators-solutions/311-category-row-general.php');
  require('300-simulators-solutions/320-category-detail-block.php');
  require('300-simulators-solutions/330-category-feature-block.php');
  require('300-simulators-solutions/340-featured-simulator-solution.php');
  require('300-simulators-solutions/341-main-simulator.php');
  require('300-simulators-solutions/350-feature-row.php');
  require('300-simulators-solutions/360-related-links-block.php');
  require('300-simulators-solutions/370-category-links-block.php');

  // 400 - Division-Specific Modules
  require('400-divisions/400-division-summaries.php');
  require('400-divisions/410-division-feature-block.php');
  require('400-divisions/420-division-support-block.php');
  require('400-divisions/440-division-feature-row.php');

  // 500 - Promotion Modules
  require('500-promotions/500-double-promotion.php');
  require('500-promotions/510-division-promotion.php');
  require('500-promotions/520-call-to-action.php');
  require('500-promotions/530-testimonial.php');
  require('500-promotions/540-video-playlist.php');
  require('500-promotions/550-simulator-promotion.php');
  require('500-promotions/560-video-promotion.php');
  require('500-promotions/570-photo-promotion.php');
  require('500-promotions/580-video-photo-promotion.php');
  require('500-promotions/590-promotion-links.php');

  // 600 - Widgets
  require('600-widgets/600-newsletter-signup.php');
  require('600-widgets/610-masthead-and-buttons.php');
  require('600-widgets/620-division-logos.php');
  require('600-widgets/630-contact-info-blocks.php');
  require('600-widgets/640-copyright-info.php');

  // 700 - Theme Settings
  require('700-settings/700-theme-settings/700-theme-defaults.php');
  require('700-settings/700-theme-settings/701-calls-to-action.php');
  require('700-settings/700-theme-settings/702-photo-promotions.php');
  require('700-settings/700-theme-settings/703-video-promotions.php');
  require('700-settings/700-theme-settings/704-footer-promotions.php');
  require('700-settings/700-theme-settings/705-sectors.php');

  require('700-settings/710-division-settings/710-faac-commercial.php');
  require('700-settings/710-division-settings/711-faac-military.php');
  require('700-settings/710-division-settings/712-milo-range.php');
  require('700-settings/710-division-settings/713-realtime-technologies.php');

  require('700-settings/720-category-settings/720-global-settings.php');
  require('700-settings/720-category-settings/721-military.php');
  require('700-settings/720-category-settings/722-use-of-force.php');
  require('700-settings/720-category-settings/723-public-safety.php');
  require('700-settings/720-category-settings/724-transportation.php');
  require('700-settings/720-category-settings/725-research.php');

  // 800 - General Content Page Templates
  require('800-content-pages/800-homepage.php');
  require('800-content-pages/810-simulators-parent.php');
  require('800-content-pages/820-solutions-parent.php');
  require('800-content-pages/830-category-parent.php');
  require('800-content-pages/840-solutions-child.php');
  require('800-content-pages/842-simulations-child.php');
  require('800-content-pages/850-content-general.php');
  require('800-content-pages/860-content-news.php');
  require('800-content-pages/861-content-videos.php');
  require('800-content-pages/862-content-resources.php');
  require('800-content-pages/863-content-testimonials.php');
  require('800-content-pages/870-content-landing.php');

  // 900 - Division Page Templates
  require('900-division-templates/910-division-index.php');
  require('900-division-templates/920-division-parent.php');
  require('900-division-templates/930-division-internal.php');
  require('900-division-templates/940-division-news.php');
  require('900-division-templates/941-division-videos.php');
  require('900-division-templates/942-division-resources.php');
  require('900-division-templates/950-division-category.php');
  require('900-division-templates/960-division-simulation.php');
  require('900-division-templates/970-division-solution.php');

endif;

?>
