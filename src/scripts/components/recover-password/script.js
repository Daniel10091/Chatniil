var recover_form = $('#recoverForm')
var recover_name = $('input[name="name"]')
var recover_username = $('input[name="username"]')
var recover_email = $('input[name="email"]')
var recover_button = $('.btn-primary')

var recover_container = $('.recover__message')
var recover_message = $('.recover__message p')

function recoverMessage ( type, message ) {
  recover_message.text(message)
  recover_container.addClass('is-visible').attr('data-message', type)
}

function validateEmail ( emailAddress ) {
  var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i
  return pattern.test( emailAddress )
}

function checkName ( name ) {
  var data = 'Daniel Aguiar'

  if (name === data) {
    return true
  } else {
    return false
  }
}

function checkUsername ( username ) {
  var data = 'daniel_10091'

  if (username === data) {
    return true
  } else {
    return false
  }
}

function checkEmail ( email ) {
  var data = 'daniel@gmail.com'

  if (email === data) {
    return true
  } else {
    return false
  }
}

function recoverLoad () {
  $('body').append(`
    <div class="recover_load">
      <div class="load_icon"></div>
    </div>
  `)
  $('.recover_load').delay(2000).fadeOut('slow', function () {
    $('.recover_load').remove()
  })
}

recover_form.submit(function (e) {
  e.preventDefault()
})

recover_button.on('click', function (e) {
  e.preventDefault()
  if (recover_name.val() === '') {
    recoverMessage( 'error', 'Please, enter your name!' )
    recover_name.focus()
  } else if (!checkName ( recover_name.val() )) {
    recoverMessage( 'error', 'Your name is wrong!' )
    recover_name.focus()
  } else if (recover_username.val() === '') {
    recoverMessage( 'error', 'Please, enter your username!' )
    recover_username.focus()
  } else if (!checkUsername ( recover_username.val() )) {
    recoverMessage( 'error', 'Your username is wrong!' )
    recover_username.focus()
  } else if (recover_email.val() === '') {
    recoverMessage( 'error', 'Please, enter your email!' )
    recover_email.focus()
  } else if (!validateEmail ( recover_email.val() )) {
    recoverMessage( 'error', 'Please, enter a valid email!' )
    recover_email.focus()
  } else if (!checkEmail ( recover_email.val() )) {
    recoverMessage( 'error', 'Your email is wrong!' )
    recover_email.focus()
  } else {
    recoverMessage( 'success', 'Success!' )
    $(window).delay(1000).queue(function () {
      window.location.href = 'new-password.html'
    })
  }
})

$(document).keypress(function (e) {
  if (e.which === 13) {
    e.preventDefault()
    recover_button.click()
  }
})