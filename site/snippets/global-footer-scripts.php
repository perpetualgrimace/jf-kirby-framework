<?= js('assets/build/js/main.min.js') ?>

<script>

  // typekit
  (function(d) {
    var config = {
      kitId: 'ugo0ell',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);


// Google Analytics
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-64615429-1', 'auto');
ga('send', 'pageview');

(function(d,s,i,r) { if (d.getElementById(i)){return;} var n=d.createElement(s),e=d.getElementsByTagName(s)[0]; n.id=i;n.src='//js.hs-analytics.net/analytics/'+(Math.ceil(new Date()/r)*r)+'/498501.js'; e.parentNode.insertBefore(n, e); })(document,"script","hs-analytics",300000);

</script>

<!-- <script type="text/javascript" src="//js.leadin.com/js/v1/2123341.js" id="LeadinEmbed-2123341" crossorigin="use-credentials" async defer></script> -->
