<?php
/**
 * Universal header content
 */

// Sets page query values, needed for some components
set_category_prefix();
set_division_prefix();
set_sector();

// Header metatags
get_component( 'meta', 'head' );

// Favicons
get_component( 'meta', 'favicons' );

// Google Tag Manager
get_component( 'meta', 'google-tag-manager' );

// Typekit
get_component( 'meta', 'typekit' );

// WordPress head() function
wp_head();
