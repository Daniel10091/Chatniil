"use strict";

var app__body = $('.app__body');
var windowWidth = window.innerWidth;
var windowHeight = window.innerHeight;
app__body.width(windowWidth).height(windowHeight);

window.onresize = function () {
  var windowWidth = window.innerWidth;
  var windowHeight = window.innerHeight;
  app__body.width(windowWidth).height(windowHeight);
};

$(document).ready(function () {
  if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
    $('body').addClass('mobile-device');
  } else {
    $('body').addClass('computer-device');
  }
}());