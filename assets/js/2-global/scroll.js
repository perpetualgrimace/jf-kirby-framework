$(document).ready(function() {

  ////////////////////////////////
  // smooth scroll
  ////////////////////////////////

  // list of selectors to exclude
  var excludes = [
    '[href="#"]',
    '[data-nav="toggle"]'
  ];
  // create selector by joining excluded selectors with :not()
  var selector = 'a[href*="#"]:not(' + excludes.join('):not(') + ')';
  var timing = 800;

  // smooth scroll
  $(function() {
    $(selector).click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top - $('.nav-container').outerHeight(true)
          }, timing);
          return false;
        }
      }
    });
  });

});
