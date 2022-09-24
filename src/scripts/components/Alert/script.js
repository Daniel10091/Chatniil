function appAlert ( type, message ) { // type = alert || confirm
  var alertElement = `
    <div class="app_alert" data-alert="${ type }"> 
      <div class="alert_box"> 
        <div class="alert-message"> 
          <p>${ message }</p>
        </div>
        <div class="alert-options"> 
          <menu type="context"> 
            <li class="menu_option"> 
              <button class="alert__confirm">Ok</button>
            </li>
            <li class="menu_option"> 
              <button class="alert__cancel">Cancel</button>
            </li>
          </menu>
        </div>
      </div>
    </div>
  `
  $('body').append(alertElement)
  $('.app_alert').delay(100).queue(function () {
    $(this).addClass('is-show').dequeue()
  })
  var appAlert = $('.app_alert')
  var appAlert_options = appAlert.find('.alert-options menu li button')
  var alertConfirm = $('.alert__confirm')
  var alertCancel = $('.alert__cancel')

  alertConfirm.focus()
  appAlert_options.on('click', function () {
    appAlert.removeClass('is-show')
    appAlert.delay(100).queue(function () {
      $(this).remove().dequeue()
    })
  })

  $(document).keypress(function (e) {
    if (appAlert.hasClass('is-show')) {
      if (e.which === 13) {
        e.preventDefault()
        if (alertConfirm.is(":focus")) {
          alertConfirm.click()
        } else if (alertCancel.is(":focus")) {
          alertCancel.click()
        }
      }
    }
  })
}