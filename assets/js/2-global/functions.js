//////////////////////////////////////
// interactions
//////////////////////////////////////

// when hovering or focusing a title,
// add a state class to the container
function titleFocus(title, container) {

  $(title).focus(function() {
    $(this).closest(container).addClass('is-focused');
  });
  $(title).blur(function() {
    $(this).closest(container).removeClass('is-focused');
  });
  $(title).mouseenter(function() {
    $(this).closest(container).addClass('is-focused');
  });
  $(title).mouseleave(function() {
    $(this).closest(container).removeClass('is-focused');
  });
}


// focus the parent
function parentFocus(selector, parent) {

  $(selector).focus(function() {
    $(this).closest(parent).addClass('is-focused');
  });
  $(selector).blur(function() {
    $(this).closest(parent).removeClass('is-focused');
  });
}


// delay function
// thanks, https://coderwall.com/p/biqpfw/jquery-window-size-onload-and-onresize
var delay = (function() {
  var timer = 0;
  return function(callback, ms){
    clearTimeout(timer);
    timer = setTimeout(callback, ms);
  };
})();
