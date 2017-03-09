// images
function lazyloadImg() {

  $('img[data-src]').each(function() {
    var sourceFile = $(this).attr('data-src');
    $(this).attr('src', sourceFile);
  });

}


// background
function lazyloadBg() {

  $('[data-bg-src]').each(function() {
    var sourceFile = $(this).attr('data-bg-src');
    var bgPath = "url(" + sourceFile + ")";
    $(this).css('background-image', bgPath);
  });

}


$(document).ready(function() {
  lazyloadImg();
  lazyloadBg();
});
