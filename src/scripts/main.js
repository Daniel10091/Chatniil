var app__body = $('.app__body')

var windowWidth = window.innerWidth
var windowHeight = window.innerHeight

app__body.width(windowWidth).height(windowHeight)

window.onresize = function () {
  var windowWidth = window.innerWidth
  var windowHeight = window.innerHeight
  app__body.width(windowWidth).height(windowHeight)
}

$(document).ready(function() {
  if ( navigator.userAgent.match(/Android/i)
    || navigator.userAgent.match(/webOS/i)
    || navigator.userAgent.match(/iPhone/i)
    || navigator.userAgent.match(/iPad/i)
    || navigator.userAgent.match(/iPod/i)
    || navigator.userAgent.match(/BlackBerry/i)
    || navigator.userAgent.match(/Windows Phone/i)) {

    $('body').addClass('mobile-device')
  } else {
    $('body').addClass('computer-device')
  }
}())

var LogOut = document.querySelector('.app__logOut')
var personId = LogOut.getAttribute('data-personId')
var isonfocus = true
var minutes = 0
var seconds = 0
var totalSeconds = 0
// var timeActive = minutes + ':' + seconds
// var timeFocus = minutes + ':' + seconds
var timeBlur = minutes + ':' + seconds

setInterval( setTime, 1000 )

function setTime () {
  ++totalSeconds
  seconds = pad( totalSeconds % 60 )
  minutes = pad( parseInt(totalSeconds / 60) )
  // timeActive = minutes + ':' + seconds

  // window.onblur = function () {
  //   isonfocus = false
  // }
  // window.onfocus = function () {
  //   isonfocus = true
  // }
  // $(window).blur(function () {
  //   isonfocus = false
  // })
  // $(window).focus(function () {
  //   isonfocus = true
  // })
  $(window).mouseleave(function () { 
    isonfocus = false
  })
  $(window).mouseenter(function () { 
    isonfocus = true
  })

  if (isonfocus === false) {
    // timeFocus = 0 + ':' + 0
    timeBlur = minutes + ':' + seconds
    // console.log('onblur: ' + timeBlur)
  } else {
    totalSeconds = 0
    // timeFocus = minutes + ':' + seconds
    timeBlur = 0 + ':' + 0
  }
  if (timeBlur === '30:00') {
    appAlert( 'alert', 'Session closed. Please login again.' )

    $('.alert__confirm').on('click', function () {
      $('.app__logOut').click()
    })
  }

  // console.log('Active: ' + timeActive)
  // console.log('Focus: ' + timeFocus)
  // console.log('onblur: ' + onBlur)
}

function pad ( val ) {
  var valString = val + ''
  if (valString.length < 2) {
    return '0' + valString
  } else {
    return valString
  }
}


// window.onbeforeunload = function (e) {
//   var e = e || window.event;

//   //IE & Firefox
//   if (e) {
//     e.returnValue = 'Are you sure?';
//   }

//   // For Safari
//   return 'Are you sure?';
// };

// $(window).bind('beforeunload', function (e) {
//   // code to execute when browser is closed
//   // e.$.post("func.php", { action: 'action', id_userMsg: '<?php echo $id_user; ?>' });
//   console.log(e)
// })

// window.onbeforeunload = function () {
//   return "Do you really want to close?"
// }