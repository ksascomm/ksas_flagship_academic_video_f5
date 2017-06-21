<?php $theme_option = flagship_sub_get_global_options(); 
      $analytics_id = $theme_option['flagship_sub_google_analytics']; ?>

<script>
!function(e,a,n,t,c,g,o){e.GoogleAnalyticsObject=c,e[c]=e[c]||function(){(e[c].q=e[c].q||[]).push(arguments)},e[c].l=1*new Date,g=a.createElement(n),o=a.getElementsByTagName(n)[0],g.async=1,g.src=t,o.parentNode.insertBefore(g,o)}(window,document,"script","//www.google-analytics.com/analytics.js","ga"),ga("create","<?php echo $analytics_id; ?>","jhu.edu"),ga("create","UA-40512757-1",{name:"globalKSAS"}),ga("send","pageview"),ga("globalKSAS.send","pageview");

</script>

<script>
!function(){var e=document.createElement("script");e.type="text/javascript",e.async=!0,e.src="//siteimproveanalytics.com/js/siteanalyze_11464.js";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)}();
</script>