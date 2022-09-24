"use strict";

function appAlert(type, message) {
  var alertElement = "\n    <div class=\"app_alert\" data-alert=\"".concat(type, "\"> \n      <div class=\"alert_box\"> \n        <div class=\"alert-message\"> \n          <p>").concat(message, "</p>\n        </div>\n        <div class=\"alert-options\"> \n          <menu type=\"context\"> \n            <li class=\"menu_option\"> \n              <button class=\"alert__confirm\">Ok</button>\n            </li>\n            <li class=\"menu_option\"> \n              <button class=\"alert__cancel\">Cancel</button>\n            </li>\n          </menu>\n        </div>\n      </div>\n    </div>\n  ");
  $('body').append(alertElement);
  $('.app_alert').delay(100).queue(function () {
    $(this).addClass('is-show').dequeue();
  });
  var appAlert = $('.app_alert');
  var appAlert_options = appAlert.find('.alert-options menu li button');
  var alertConfirm = $('.alert__confirm');
  var alertCancel = $('.alert__cancel');
  alertConfirm.focus();
  appAlert_options.on('click', function () {
    appAlert.removeClass('is-show');
    appAlert.delay(100).queue(function () {
      $(this).remove().dequeue();
    });
  });
  $(document).keypress(function (e) {
    if (appAlert.hasClass('is-show')) {
      if (e.which === 13) {
        e.preventDefault();

        if (alertConfirm.is(":focus")) {
          alertConfirm.click();
        } else if (alertCancel.is(":focus")) {
          alertCancel.click();
        }
      }
    }
  });
}