<script>

  // async
  function downloadJSAtOnload() {
    var element = document.createElement("script");
    element.src = "<?= $site->url()?>/assets/build/js/main.min.js";
    document.body.appendChild(element);
  }
  if (window.addEventListener) {
    window.addEventListener("load", downloadJSAtOnload, false);
  } else if (window.attachEvent) {
    window.attachEvent("onload", downloadJSAtOnload);
  } else {
    window.onload = downloadJSAtOnload;
  }

  // Typekit
  /*
  (function(d) {
    var config = {
      kitId: 'ugo0ell',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
  */


  // Google Analytics
  /*
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  */

</script>
