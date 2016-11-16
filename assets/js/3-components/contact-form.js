$(document).ready(function(){

  // switch email type to 'text' and remove 'required' attribute, so we can do our own validation when js is loaded
  $('#contact-form-email').attr('type', 'text');
  $('[data-required="true"]').removeAttr('required');

  // email validation function
  function isEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
      return false;
    } else {
      return true;
    }
  }

  // form submission
  $('#contact-form').on('submit', function(e) {

    // re-hide error messages on submit
    $('[data-validation]').hide();

    // validation
    var name  = $('#contact-form-name').val();
    var email = $('#contact-form-email').val();
    var text  = $('#contact-form-text').val();

    if (name === '') {
      $('[data-validation="name-empty"]').show();
      $('#contact-form-name').focus();
      return false;
    }
    if (email === '') {
      $('[data-validation="email-empty"]').show();
      $('#contact-form-email').focus();
      return false;
    }
    if(isEmail(email) === false) {
      e.preventDefault();
      $('[data-validation="email-invalid"]').show();
      $('#contact-form-email').focus();
      return false;
    }

    if (text === '') {
      $('[data-validation="text-empty"]').show();
      $('#contact-form-text').focus();
      return false;
    }

    // submission, commented out since it broke the form last time I checked
    /*
    e.preventDefault();
    var formData = $(this).serialize();

    $.post($(this).attr("action"), formData)
    .done(function(data) {
      $('#contact-form').hide();
      $('[data-confirmation="success"]').show('slow');
    })
    .fail(function(err) {
      $('#contact-form').hide();
      $('[data-confirmation="fail"]').show('slow');
    });

    */

  });
});
