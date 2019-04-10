<footer class="content-info">
  <div class="container">

  <?php
  $division = get_the_terms( get_the_ID(), 'division' );

  $divisionName = $division[0]->name;
    if( $divisionName == 'FAAC Commercial' ){
      $divisionPrefix = 'faac-commercial';
    } elseif( $divisionName == 'FAAC Military' ){
      $divisionPrefix = 'faac-military';
    } elseif( $divisionName == 'MILO Range' ){
      $divisionPrefix = 'milo-range';
    } elseif( $divisionName == 'Realtime Technologies' ){
      $divisionPrefix = 'rti';
    } else {
      $divisionPrefix = 'sidebar';
    }

    $divisionFooter = $divisionPrefix . '-footer';

  ?>

    <?php dynamic_sidebar($divisionFooter); ?>
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
