"use strict";

var login_form = $('#loginForm');
var login_login = $('input[name="login"]');
var login_password = $('input[name="password"]');
var login_button = $('.btn-primary');
var showPassword = $('.show-password');
var remember_check = $('#remember');
var login_container = $('.login__message');
var login_message = $('.login__message p');

function loginMessage(type, message) {
  login_message.text(message);
  login_container.addClass('is-visible').attr('data-message', type);
}

function loginLoad() {
  $('body').append("\n    <div class=\"login_load\">\n      <div class=\"load_icon\"></div>\n    </div>\n  ");
  $('.login_load').delay(2000).fadeOut('slow', function () {
    $('.login_load').remove();
  });
}

if (localStorage.getItem('Login-Remember')) {
  login_login.val(localStorage.getItem('Login-Remember'));
  remember_check.prop('checked', true);
  login_password.focus();
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
login_form.submit(function (e) {
  e.preventDefault();
});
login_button.on('click', function (e) {
  e.preventDefault();

  if (login_login.val() === '') {
    loginMessage('error', 'Please, enter your email or username!');
    login_login.focus();
  } else if (login_password.val() === '') {
    loginMessage('error', 'Please, enter your password!');
    login_password.focus();
  } else {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "src/php/login.php", true);

    xhr.onload = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var data = xhr.response;

          if (data === 'success') {
            loginMessage('success', 'Success!');
            $(window).delay(350).queue(function () {
              window.location.href = 'App.html';
            });
          } else {
            console.log(data);
          }
        } else {
          loginLoad();
          login_container.delay(2200).queue(function () {
            $('body').addClass('page-not-found').dequeue();
            loginMessage('error', xhr.status + ' - Page not found.');
          });
        }
      } else {
        loginLoad();
        login_container.delay(2200).queue(function () {
          $('body').addClass('page-not-found').dequeue();
          loginMessage('error', 'Error loading page.');
        });
      }
    };

    xhr.send(); // let formData = new FormData(register_form)
    // xhr.send(formData)
  }
});
remember_check.change(function () {
  if (login_login.val() === '') {
    remember_check.prop('checked', false);
    loginMessage('error', 'Please, enter your email or username!');
    login_login.focus();
  } else if (remember_check.prop('checked') === true) {
    var login_value = login_login.val();
    localStorage.setItem('Login-Remember', login_value);
  } else if (remember_check.prop('checked') === false) {
    localStorage.removeItem('Login-Remember');
  }
});
$(document).keypress(function (e) {
  if (e.which === 13) {
    e.preventDefault();
    login_button.click();
  }
});