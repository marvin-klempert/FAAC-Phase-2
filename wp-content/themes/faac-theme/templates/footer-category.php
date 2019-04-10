<footer class="content-info">
  <div class="container">

  <?php
  $category = get_the_terms( get_the_ID(), 'category' );

  $categoryName = $category[0]->name;
    if( $categoryName == 'FAAC Commercial' ){
      $categoryName = 'faac-commercial';
    } elseif( $categoryName == 'FAAC Military' ){
      $categoryName = 'faac-military';
    } elseif( $categoryName == 'MILO Range' ){
      $categoryName = 'milo-range';
    } elseif( $categoryName == 'Realtime Technologies' ){
      $categoryName = 'rti';
    } else {
      $categoryName = '';
    }

    $categoryFooter = $categoryName . '-footer';

  ?>

    <?php dynamic_sidebar($categoryFooter); ?>
  </div>
</footer>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-75611918-1', 'auto');
  ga('send', 'pageview');

</script>
