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

  <?php wp_head(); ?>

  <?php // Google site verification ?>
  <meta name="google-site-verification" content="9VsKkcWVv7wvjaf8-BmoyYgNZkdao08sfiC5WbY07zQ" />

  <?php // Site Favicons
    // Favicons differ between divisions, but because they are dependent on category or division choices in the admin, different favicon files are used.
    if( is_single() ):
      include( locate_template('templates/60-meta/601-favicon-post.php', false, false));
    else:
      include( locate_template('templates/60-meta/600-favicon-page.php', false, false));
    endif;
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

  <?php // Styles from Melanie ?>
  <link rel="stylesheet" href="/wp-content/themes/faac-theme/style.css">
</head>
