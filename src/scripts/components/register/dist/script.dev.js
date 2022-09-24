"use strict";

var register_form = $('#registerForm');
var register_name = $('input[name="name"]');
var register_username = $('input[name="username"]');
var register_email = $('input[name="email"]');
var register_password = $('input[name="password"]');
var register_picture = $('input[name="picture"]');
var register_button = $('.btn-primary');
var showPassword = $('.show-password');
var register_container = $('.register__message');
var register_message = $('.register__message p');

function registerMessage(type, message) {
  register_message.text(message);
  register_container.addClass('is-visible').attr('data-message', type);
}

function validateEmail(emailAddress) {
  var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
  return pattern.test(emailAddress);
}

function loadPictureFile(event) {
  var pictureUrl = URL.createObjectURL(event.target.files[0]);
  var load_progressbar = $('.load_progress_bar');
  var load_icon = load_progressbar.find('.icon span');
  var load_check = $('.load_ckeck');
  load_check.removeClass('file-loaded');
  load_progressbar.addClass('is-visible');
  register_button.prop('disabled', true);
  load_icon.animate({
    width: '100%'
  }, 2000, function () {
    load_progressbar.removeClass('is-visible');
    register_button.prop('disabled', false);
    load_check.delay(100).queue(function () {
      $(this).addClass('file-loaded').dequeue();
      load_icon.animate({
        width: 0
      }, 0);
    });
  });
}

function registerLoad() {
  $('body').append("\n    <div class=\"register_load\">\n      <div class=\"load_icon\"></div>\n    </div>\n  ");
  $('.register_load').delay(2000).fadeOut('slow', function () {
    $('.register_load').remove();
  });
}

showPassword.on('click', function (e) {
  e.preventDefault();
  var parent = $(this.parentNode);
  var icon = $(this).find('ion-icon');
  var input = parent.find('input');

  if (input.attr('type') === 'password') {
    icon.attr('name', 'eye-outline');
    input.attr('type', 'text');
  } else {
    icon.attr('name', 'eye-off-outline');
    input.attr('type', 'password');
  }

  input.focus();
});
register_form.submit(function (e) {
  e.preventDefault();
});
register_button.on('click', function (e) {
  e.preventDefault();

  if (register_name.val() === '') {
    registerMessage('error', 'Please, enter your name!');
    register_name.focus();
  } else if (register_username.val() === '') {
    registerMessage('error', 'Please, enter your username!');
    register_username.focus();
  } else if (register_email.val() === '') {
    registerMessage('error', 'Please, enter your email!');
    register_email.focus();
  } else if (!validateEmail(register_email.val())) {
    registerMessage('error', 'Please, enter a valid email!');
    register_email.focus();
  } else if (register_password.val() === '') {
    registerMessage('error', 'Please, enter your password!');
    register_password.focus();
  } else if (register_picture.val() === '') {
    registerMessage('error', 'Please, enter your picture!');
    register_picture.click();
  } else {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "src/php/register.php", true);

    xhr.onload = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var data = xhr.response;

          if (data === 'success') {
            registerMessage('success', 'Success!');
            $(window).delay(1000).queue(function () {
              window.location.href = 'App.html';
            });
          } else {
            console.log(data);
            $('body').html(data);
          }
        } else {
          registerLoad();
          register_container.delay(2200).queue(function () {
            $('body').addClass('page-not-found').dequeue();
            registerMessage('error', xhr.status + ' - Page not found.');
          });
        }
      } else {
        registerLoad();
        register_container.delay(2200).queue(function () {
          $('body').addClass('page-not-found').dequeue();
          registerMessage('error', 'Error loading page.');
        });
      }
    };

    var formData = new FormData(register_form);
    xhr.send(formData);
  }
});
$(document).keypress(function (e) {
  if (e.which === 13) {
    e.preventDefault();
    register_button.click();
  }
});