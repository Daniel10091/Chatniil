"use strict";

var appBody = $('body');
$(window).on('load', function () {
  appBody.append("\n    <div class=\"app_load\"> \n      <div class=\"load_icon\"></div>\n    </div>\n  ");
  $('.app_load').delay(300).fadeOut('slow', function () {
    $('.app_load').remove();
  });
  appBody.delay(100).queue(function () {
    $(this).addClass('is-show').dequeue();
  });
});