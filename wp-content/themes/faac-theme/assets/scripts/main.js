/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.

jQuery(document).ready(function( $ ) {

  jQuery("img").unveil(200);

  jQuery('.popup-vimeo').magnificPopup({type:'iframe'});

  // The slider being synced must be initialized first
  jQuery('#carousel').flexslider({
    animation: "slide",
    animationSpeed: 400,
    controlNav: false,
    animationLoop: true,
    slideshow: true,
    itemWidth: 210,
    itemMargin: 5,
    asNavFor: '#video-slider'
  });

  jQuery('#video-slider').flexslider({
    animation: "slide",
    animationSpeed: 400,
    controlNav: false,
    animationLoop: true,
    slideshow: true,
    sync: "#carousel"
  });

  jQuery('#slider').flexslider({
    animation: "slide",
    animationSpeed: 400,
    controlNav: false,
    animationLoop: true,
    slideshow: true,
  });

  jQuery('#footer-video').flexslider({
    animation: "slide",
    animationSpeed: 400,
    controlNav: false,
    animationLoop: true,
    slideshow: true,
  });

  var $flexslider = jQuery('.flexslider-support');
  $flexslider.flexslider({
    animation: "slide",
    manualControls: ".flex-control-nav li"
  });

  jQuery("#drawer").mmenu({
    offCanvas: {
      position: "right",
      pageSelector: "#page-wrapper"
    }
  });
  var drawerMenuAPI = jQuery( "#drawer" ).data( "mmenu" );
  jQuery("#toggle").click(function() {
    drawerMenuAPI.open();
  });

  jQuery("#mobile-menu").mmenu({
    offCanvas: {
      position: "right",
      pageSelector: "#page-wrapper"
    }
  });
  var mobileMenuAPI = jQuery("#mobile-menu").data( "mmenu" );
  jQuery("#mobile-toggle").click(function() {
    mobileMenuAPI.open();
  });

  jQuery( '.menu-item' ).hover(
    function(){
        jQuery(this).children('.sub-menu').slideDown(200);
    },
    function(){
        jQuery(this).children('.sub-menu').slideUp(200);
    }
  );

  jQuery('.search-trigger').click( function(){
    jQuery('.search-form').fadeToggle(200);
  });

  if( jQuery('body').hasClass('browser-milo-range') ){
    var headerHeight = jQuery('.slider--division-internal').outerHeight();
    var navigationHeight = jQuery('.division-navigation-wrapper').outerHeight();
    var heightDiff = headerHeight - navigationHeight;
    jQuery(document).on('scroll', function() {
      if (jQuery(document).scrollTop() > heightDiff ) {
        jQuery('.primary-navigation').addClass('has-scrolled');
      } else {
        jQuery(".primary-navigation").removeClass("has-scrolled");
      }
    });
  } else {
    jQuery(document).on("scroll", function(){
      if
        (jQuery(document).scrollTop() > 300){
        jQuery(".primary-navigation").addClass("has-scrolled");
      }
      else
      {
        jQuery(".primary-navigation").removeClass("has-scrolled");
      }
    });
  }

});