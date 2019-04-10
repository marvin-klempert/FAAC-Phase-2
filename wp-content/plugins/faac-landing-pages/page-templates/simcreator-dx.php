<?php
/**
 * Template Name: Landing Page - SimCreator DX
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TB9D8MJ');</script>
    <!-- End Google Tag Manager -->
    <?php
    function landing_page_assets() {

        // Dequeue theme styles & scripts
        wp_dequeue_style( 'sage/css' );
        wp_dequeue_style( 's3-browser-css' );
        wp_dequeue_style( 'flexslider/css' );
        wp_dequeue_style( 'fontawesome/css' );
        wp_dequeue_style( 'magnificpopup/css' );
        wp_dequeue_style( 'mmenu/css' );

        wp_dequeue_script( 'flexslider/js' );
        wp_dequeue_script( 'magnificpoup/js' );
        wp_dequeue_script( 'mmenu/js' );
        wp_dequeue_script( 'unveil/js' );
        wp_dequeue_script( 'sage/js' );

        // Enqueue styles & scripts
        wp_enqueue_style( 'styles', plugins_url('faac-landing-pages') . '/resources/styles/dist/main.css' );

        wp_enqueue_script('scripts', plugins_url('faac-landing-pages') . '/resources/scripts/dist/main.js', array('jquery'), null, true);
    }
    add_action('wp_enqueue_scripts', 'landing_page_assets', 1000);

    // WP head
    wp_head();

    // Typekit
    ?>
    <script>
    (function(d) {
    var config = {
        kitId: 'muz8xjs',
        scriptTimeout: 3000,
        async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
    })(document);
    </script>
  </head>
  <body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TB9D8MJ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header>
      <section class="landing_topBanner" style="background-image: url(https://www.faac.com/wp-content/uploads/2019/01/realtime-technologies-driving-simulation-simcreatordx.jpg);">
        <div class="wrap landing_topBanner_wrap">
            <a class="top-banner__logo" href="https://faac.com/realtime-technologies/" target="blank"><img src="https://faac.staging.wpengine.com/wp-content/uploads/2017/04/realtime-technologies-logo-main.png">
            </a>
            <div class="top-banner__content">
              <h1 class="top-banner__contentTitle"><?php the_field('landing_main_headline'); ?></h1>
              <div class="top-banner__contentSubtitle"><?php the_field('landing_sub_headline'); ?></div>
              <div class="top-banner__contentDescription"><?php the_field('landing_headline_description'); ?></div>
            </div>
        </div> <!-- wrap -->
        <div class="wrap landing_topBanner_bullets_wrap">
            <div class="top-banner__bulletPoints">
                <ul class="top-banner__bulletPointsList">
                <?php if ( have_rows('landing_bullet_point_list') ) : ?>
                <?php while( have_rows('landing_bullet_point_list') ) : the_row(); ?>
                    <li><?php the_sub_field('landing_bullet_point_list_items'); ?></li>
                <?php endwhile; ?>
                <?php endif; ?>
                </ul>
            </div>
            <div class="top-banner__form">
                <div class="top-banner__formTitle">
                   Download the Quickstart Guide and Explore SimCreator DX Now
                </div>
                <?php
                echo do_shortcode ('[gravityform id="12" title="false" description="false"]');
                ?>
                <a class="top-banner__formPrivacypolicy" href="https://www.faac.com/privacy-policy" target="blank">
                    Privacy Policy
                </a>
            </div>
        </div> <!-- wrap -->
        <div class="wrap">
            <div class="top-banner__testimonial">
                <div class="top-banner__testimonialImage">
                <img src="https://www.faac.com/wp-content/uploads/2019/01/realtime-technologies-thomas-kerwin-testimonial-simcreatordx.jpg">
                </div>
                <div class="top-banner__testimonialContent">
                    <div class="top-banner__testimonialQuote"><?php the_field('landing_testimonial_quote'); ?></div>
                    <div class="top-banner__testimonialSource">
                        <span><?php the_field('landing_testimonial_source_name'); ?>,</span>
                        <span><?php the_field('landing_testimonial_source'); ?></span>
                    </div>
                </div>
            </div>
         </div> <!-- wrap -->
      </section>
     </header>
     <main>
        <section class="landing_mainContent" style="background-image: url(https://www.faac.com/wp-content/uploads/2019/01/realtime-technologies-wireframe-simcreatordx.jpg);">
            <?php if ( have_rows('landing_content_block') ) : ?>
            <?php while( have_rows('landing_content_block') ) : the_row(); ?>
            <div class="wrap landing_mainContent_wrap">
                <div class="mainContent__block">
                <h2><?php the_sub_field('landing_content_block_title'); ?></h2>
                <p><?php the_sub_field('landing_content_block_description'); ?></p>
                </div>
            </div> <!-- wrap -->
            <?php endwhile; ?>
            <?php endif; ?>
            <div class="wrap landing_mainContent_wrap">
                <div class="mainContent__block">
                <h2><?php the_field('landing_company_content_block_title'); ?></h2>
                <p><?php the_field('landing_company_content_block_description'); ?></p>
                </div>
            </div> <!-- wrap -->
        </section>
    </main>
    <footer id="footer">
        <section class="landing_footer" style="background-image: url(https://www.faac.com/wp-content/uploads/2019/01/realtime-technologies-car-interior-simcreatordx.jpg);">
            <div class="wrap">
                <div class="footer__form">
                    <h3 class="footer__formTitle">Download the Quickstart Guide and Explore SimCreator DX Now</h3>
                    <?php
                    echo do_shortcode ('[gravityform id="13" title="false" description="false"]');
                    ?>
                    <a class="footer__formPrivacypolicy" href="https://www.faac.com/privacy-policy" target="blank">
                        Privacy Policy
                    </a>
                </div>
            </div> <!-- wrap -->
            <div class="wrap">
                <div class="footer__testimonial">
                    <div class="footer__testimonialQuote"><?php the_field('landing_testimonial_short_quote'); ?></div>
                    <div class="footer__testimonialSource">
                        <span><?php the_field('landing_testimonial_source_name'); ?>,</span>
                        <span><?php the_field('landing_testimonial_source'); ?></span>
                    </div>
                </div>
            </div> <!-- wrap -->
            <div class="wrap">
            <div class="footer__tagline"><?php the_field('landing_footer_tagline'); ?></div>
            </div> <!-- wrap -->
        </section>
    </footer>
    <?php
    do_action('get_footer');
    wp_footer();
    ?>
  </body>
</html>