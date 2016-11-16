$(document).ready(function() {

  // smooth scroll
  $(function() {
    $('target[id]').attr('tabindex', '-1');

    $('a[href*=#]:not([href=#]):not(data-nav="toggle")').click(function() {
      var $linkElem = $(this);
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top
          }, 800, function() {
            target.focus();
            window.location.hash = $linkElem.attr('href').substring(1);
          });
          return false;
        }
      }
    });
  });

});
