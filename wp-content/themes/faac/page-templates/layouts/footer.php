<?php
/**
 * Universal footer content
 */

// Newsletter signup component
fwd_query_var( 'form', 'footer_newsletterSignup_formID', 'option' );
get_component( 'footer', 'newsletter-signup' );

// Masthead and buttons component
fwd_query_var( 'logo', 'footer_masthead_logo', 'option' );
fwd_query_var( 'buttons', 'footer_masthead_buttons', 'option' );
get_component( 'footer', 'masthead-buttons' );

// Navigation menu component
fwd_query_var( 'menu', 'footer_navigationMenu', 'option' );
get_component( 'footer', 'navigation' );

// Division logo component
fwd_query_var( 'logos', 'footer_divisionLogo_grid', 'option' );
get_component( 'footer', 'division-grid' );

// Contact info component
fwd_query_var( 'social', 'footer_socialMedia', 'option' );
fwd_query_var( 'contact', 'footer_contactBlocks', 'option' );
fwd_query_var( 'parent', 'footer_parentCo', 'option' );
get_component( 'footer', 'contact-info' );

// Copyright component
fwd_query_var( 'name', 'footer_copyright_name', 'option' );
fwd_query_var( 'sitemap', 'footer_copyright_sitemap', 'option' );
fwd_query_var( 'privacy', 'footer_copyright_privacyPolicy', 'option');
fwd_query_var( 'tos', 'footer_copyright_termsOfService', 'option' );
fwd_query_var( 'design', 'footer_copyright_designCredit', 'option' );
get_component( 'footer', 'copyright' );
