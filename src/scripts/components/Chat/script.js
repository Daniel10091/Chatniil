var chatbox_content = $('.chat_box_content')
// var noChatMessage__icon = '../../../src/assets/icons/no-message(02).png'
// var noChatMessage__message = 'No messages available. As soon as you send a message, they appear here.'

var appChatForm = $('.chat_box_form')

var appChatMenuOptions = $('.app__chat_menu > li > button')
var toggleChatEmogiMenu = $('.show__chat-emogi')
var chatVoiceRecorder = $('.app__chat-voice_recorder')

var chatEmogiMenu = $('.app__emogi-menu_container')
var emogiMenuOptions = $('#emogiMenu li button')
var emogiLists = $('.emogi__lists_content')
var emogiItem = $('.emogi__item span')

var chatFileMenu = $('.app__file-menu_container')
var chatFileMenu_options = $('.file_options_menu li button')
var closeFileMenu = $('.close__file_menu')


var chatBoxContainer = $('.chat_box_container')
var chatBox = $('.chat_box_content')
var chatForm = $('#appChatForm')
var chatForm_input = chatForm.find('#message')
var chatForm_button = chatForm.find('.btn-primary')

// function loadDocumentFile ( event ) {
//   var fileUrl = URL.createObjectURL(event.target.files[0])
//   var fileName = event.srcElement.files[0].name
//   var documentFileUpload = $('.document_file_upload')
//   var documentFileUpload_title = documentFileUpload.find('.title')
//   var fileContent = $('.file_content')
//   var fileContent_name = fileContent.find('b')
//   var documentLoad = $('.document_load')

//   documentFileUpload.removeClass('file-uploaded')
//   documentFileUpload_title.addClass('is-hidden')
//   uploadFileForm_button.prop('disabled', true)

//   documentLoad.addClass('is-visible')
//   fileContent.addClass('is-visible')
//   fileContent_name.text(fileName)
//   documentFileUpload.delay(2000).queue(function () {
//     $(this).addClass('file-uploaded').dequeue()
//     uploadFileForm_button.prop('disabled', false)
//   })
//   // console.log(fileUrl)

//   // documentLoad.delay(100).queue(function () {
//   //   fileContent.addClass('is-visible').dequeue()
//   //   $(this).addClass('is-visible').dequeue()
//   //   fileContent_name.text(fileName).dequeue()
//   // })
// }

function scrollToBottom () {
  var chatBox = document.querySelector('.chat_box_container')
  
  chatBox.scrollTop = chatBox.scrollHeight;
}
scrollToBottom()

appChatMenuOptions.on('click', function () {
  appChatMenuOptions.not(this).removeClass('is-selected')
  $(this).delay(100).queue(function () {
    $(this).toggleClass('is-selected').dequeue()
  })
  switch ($(this).attr('data-option')) {
    case 'emogiMenu':
      chatFileMenu.removeClass('is-show')
      chatEmogiMenu.delay(100).queue(function () {
        $(this).toggleClass('is-show').dequeue()
      })
      break;
    case 'inputFile':
      chatEmogiMenu.removeClass('is-show')
      chatFileMenu.delay(100).queue(function () {
        $(this).toggleClass('is-show').dequeue()
      })
      break;
    case 'voiceRecorder':
      chatEmogiMenu.removeClass('is-show')
      chatFileMenu.removeClass('is-show')
      appAlert( 'alert', 'This option is not yet available.' )
      $('.alert__confirm').on('click', function () {
        $('.app__chat_menu > li > button[data-option="voiceRecorder"]').removeClass('is-selected')
      })
      // .delay(100).queue(function () {
      //   $(this).toggleClass('is-show').dequeue()
      // })
      break;
  }
})

emogiMenuOptions.first().addClass('is-selected')
emogiLists.first().addClass('is-show')

function showEmogiList ( e ) {
  emogiLists.scrollTop(0)
  emogiLists.not($('#' + e + '')).removeClass('is-show')
  $('#' + e + '').delay(100).queue(function () {
    $(this).addClass('is-show').dequeue()
  })
}

emogiMenuOptions.on('click', function () {
  var list = $(this).attr('data-menu')

  emogiMenuOptions.not(this).removeClass('is-selected')
  $(this).delay(100).queue(function () {
    $(this).addClass('is-selected').dequeue()
  })
  showEmogiList( list )
})

emogiItem.on('click', function () {
  var emogi = $(this).text()
  var value = chatForm_input.val()

  chatForm_input.val(value + emogi)
  chatForm_input.focus()
})

closeFileMenu.on('click', function () {
  chatFileMenu.delay(100).queue(function () {
    $(this).removeClass('is-show').dequeue()
    $('.app__chat-file_upload').removeClass('is-selected').dequeue()
  })
})

// chatForm.submit(function (e) {
//   e.preventDefault()
// })

chatForm_input.keyup(function () {
  if ($(this).val() !== '') {
    chatForm_button.prop('disabled', false)
  } else {
    chatForm_button.prop('disabled', true)
  }
})

// chatForm_button.on('click', function () {
//   if (chatForm_input.val() !== '') {
//     chatForm_button.prop('disabled', false)
//     chatForm_input.val('')
//     scrollToBottom()
//   } else {
//     chatForm_button.prop('disabled', true)
//     chatForm_input.focus()
//   }
// })

chatBox.on('click', function () {
  if (chatEmogiMenu.hasClass('is-show')) {
    chatEmogiMenu.removeClass('is-show')
    appChatMenuOptions.removeClass('is-selected')
    // emogiLists.scrollTop(0)
    // emogiMenuOptions.first().click()
  } else if (chatFileMenu.hasClass('is-show')) {
    appChatMenuOptions.removeClass('is-selected')
    chatFileMenu.removeClass('is-show')
  }
})

chatBoxContainer.mouseenter(function () {
  $(this).addClass('is-focus')
})

chatBoxContainer.mouseleave(function () {
  $(this).removeClass('is-focus')
  scrollToBottom()
})

$(document).keypress(function (e) {
  if (!$('.app_alert').hasClass('is-show')) {
    if (!$('.app__chat-file_container[data-file="picture"]').hasClass('is-show')) {
      if (!$('.app__chat-file_container[data-file="document"]').hasClass('is-show')) {
        if (e.which === 13) {
          e.preventDefault()
          chatForm_button.click()
          if (chatForm_input.val() !== '') {
            // var message = chatForm_input.val()
            // var lines = message.replace('','\n')
            
            // message.replace(/\s/g,'\n')
            // chatForm_input.val(lines)
            
            scrollToBottom()
            chatForm_input.val('')
          } else {
            chatForm_input.focus()
          }
        }
      } else {
        if (e.which === 13) {
          e.preventDefault()
          $('.app__chat-file_container[data-file="document"]').find('.btn-primary').click()
        }
      }
    } else {
      if (e.which === 13) {
        e.preventDefault()
        $('.app__chat-file_container[data-file="picture"]').find('.btn-primary').click()
      }
    }
  }
})