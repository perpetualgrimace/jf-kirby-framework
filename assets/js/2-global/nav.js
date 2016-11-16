// nav

$(document).ready(function() {

  // menu toggle
  $('[data-nav="toggle"]').click(function() {
    $('[data-nav="toggle"]').toggleClass('is-inactive is-active');
    $('[data-nav="hamburger"]').toggleClass('is-inactive is-active');
    $('.nav-list').toggleClass('is-collapsed is-expanded');
  });

  // add keyboard focus for dropdown items
  $('.dropdown-link').focus(function() {
    $(this).closest('.dropdown').addClass('is-focused');
  });
  $('.dropdown-link').blur(function() {
    $(this).closest('.dropdown').removeClass('is-focused');
  });

  // make the skip link actually skip
  // https://www.bignerdranch.com/blog/web-accessibility-skip-navigation-links/
  $('.skip').click(function(event) {

    var skipTo="#"+this.href.split('#')[1];

    $(skipTo).attr('tabindex', -1).on('blur focusout', function () {
      $(this).removeAttr('tabindex');
    }).focus();

  });

});
