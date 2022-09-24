"use strict";

var recover_form = $('#newPasswordForm');
var recover_password01 = $('input[name="password01"]');
var recover_password02 = $('input[name="password02"]');
var recover_button = $('.btn-primary');
var showPassword = $('.show-password');
var recover_container = $('.recover__message');
var recover_message = $('.recover__message p');

function recoverMessage(type, message) {
  recover_message.text(message);
  recover_container.addClass('is-visible').attr('data-message', type);
}

function recoverLoad() {
  $('body').append("\n    <div class=\"recover_load\">\n      <div class=\"load_icon\"></div>\n    </div>\n  ");
  $('.recover_load').delay(2000).fadeOut('slow', function () {
    $('.recover_load').remove();
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
recover_form.submit(function (e) {
  e.preventDefault();
});
recover_button.on('click', function (e) {
  e.preventDefault();

  if (recover_password01.val() === '') {
    recoverMessage('error', 'Please, enter a password!');
    recover_password01.focus();
  } else if (recover_password02.val() === '') {
    recoverMessage('error', 'Please, repeat password!');
    recover_password02.focus();
  } else if (recover_password02.val() !== recover_password01.val()) {
    recoverMessage('error', "Password don't match!");
    recover_password02.focus();
  } else {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "src/php/new-password.php", true);

    xhr.onload = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var data = xhr.response;

          if (data === 'success') {
            recoverMessage('success', 'Success!');
            $(window).delay(1000).queue(function () {
              window.location.href = 'App.html';
            });
          } else {
            console.log(data);
          }
        } else {
          recoverLoad();
          recover_container.delay(2200).queue(function () {
            $('body').addClass('page-not-found').dequeue();
            recoverMessage('error', xhr.status + ' - Page not found.');
          });
        }
      } else {
        recoverLoad();
        recover_container.delay(2200).queue(function () {
          $('body').addClass('page-not-found').dequeue();
          recoverMessage('error', 'Error loading page.');
        });
      }
    };

    xhr.send(); // let formData = new FormData(register_form)
    // xhr.send(formData)
  }
});