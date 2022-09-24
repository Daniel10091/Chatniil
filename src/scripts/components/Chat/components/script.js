var pic__appFileBox = $('.app__chat-file_container[data-file="picture"]')
// var pic__appFileBox_image = pic__appFileBox.find('.image_file')
var pic__uploadFile_message = pic__appFileBox.find('.upload_file__message')
var pic__cancelUploadFile = pic__appFileBox.find('.cancel__upload_file')
var pic__uploadFileForm = pic__appFileBox.find('#uploadPictureForm')
var pic__uploadFileForm_file = pic__uploadFileForm.find('#picture')
var pic__uploadFileForm_message = pic__uploadFileForm.find('#message')
var pic__uploadFileForm_button = pic__uploadFileForm.find('.btn-primary')

var doc__appFileBox = $('.app__chat-file_container[data-file="document"]')
// var doc__appFileBox_image = doc__appFileBox.find('.document_file')
var doc__appFileBox_document = doc__appFileBox.find('.document_file')
var doc__uploadFile_message = doc__appFileBox.find('.upload_file__message')
var doc__cancelUploadFile = doc__appFileBox.find('.cancel__upload_file')
var doc__uploadFileForm = doc__appFileBox.find('#uploadDocumentForm')
var doc__uploadFileForm_file = doc__uploadFileForm.find('#document')
var doc__uploadFileForm_message = doc__uploadFileForm.find('#message')
var doc__uploadFileForm_button = doc__uploadFileForm.find('.btn-primary')

function uploadPicFileMessage ( type, message ) {
  pic__uploadFile_message.find('p').text(message)
  pic__uploadFile_message.addClass('is-visible').attr('data-message', type)
}

function uploadDocFileMessage ( type, message ) {
  doc__uploadFile_message.find('p').text(message)
  doc__uploadFile_message.addClass('is-visible').attr('data-message', type)
}

chatFileMenu_options.on('click', function () {
  chatFileMenu.removeClass('is-show')
  $('.app__chat-file_upload').removeClass('is-selected')
  switch ($(this).attr('data-option')) {
    case 'picture':
      pic__appFileBox.delay(100).queue(function () {
        $(this).addClass('is-show').dequeue()
      })
      pic__uploadFileForm_file.delay(200).queue(function () {
        $(this).click().dequeue()
      })
      break;
    case 'document':
      doc__appFileBox.delay(100).queue(function () {
        $(this).addClass('is-show').dequeue()
      })
      doc__uploadFileForm_file.delay(200).queue(function () {
        $(this).click().dequeue()
      })
      break;
    case 'video':
      appAlert( 'alert', 'This option is not yet available.' )
      break;
  }
})

pic__cancelUploadFile.on('click', function () {
  pic__appFileBox.delay(100).queue(function () {
    $(this).removeClass('is-show').dequeue()
    pic__uploadFile_message.removeClass('is-visible')
    $('.picture_file_upload').removeClass('file-uploaded unsupported-file').find('.title').removeClass('is-hidden')
    $('.picture_file_preview').removeClass('is-visible').find('img').attr('src', '')
    $('.picture_file_content').removeClass('is-visible')
    $('#uploadPictureForm').find('input').val('')
    $('.picture_load').removeClass('is-visible')
    $('.picture_file').removeClass('is-show')
  })
})

doc__cancelUploadFile.on('click', function () {
  doc__appFileBox.delay(100).queue(function () {
    $(this).removeClass('is-show').dequeue()
    doc__uploadFile_message.removeClass('is-visible')
    $('.document_file_upload').removeClass('file-uploaded unsupported-file').find('.title').removeClass('is-hidden')
    $('.dicument_file_content').removeClass('is-visible').find('b').text('')
    $('#uploadDocumentForm').find('input').val('')
    $('.document_load').removeClass('is-visible')
    $('.document_file').removeClass('is-show')
  })
})

chatbox_content.on('click', function () {
  if (pic__appFileBox.hasClass('is-show')) {
    pic__cancelUploadFile.click()
  } else if (doc__appFileBox.hasClass('is-show')) {
    doc__cancelUploadFile.click()
  }
})

// pic__uploadFileForm_button.submit(function (e) {
//   e.preventDefault()
// })

// pic__uploadFileForm_button.on('click', function () {
//   if (pic__uploadFileForm_file.val() !== '') {
//     let xhr = new XMLHttpRequest()

//     xhr.open('POST', '../php/chat/document-insert.php', true)
//     xhr.onload = () => {
//       if (xhr.readyState === XMLHttpRequest.DONE) {
//         if (xhr.status === 200) {
//           let data = xhr.response

//           if (data === 'success') {
//             pic__appFileBox.delay(100).queue(function () {
//               scrollToBottom()
//               new Audio('../assets/audios/send.mp3').play()
//               $(this).removeClass('is-show').dequeue()
//               pic__uploadFile_message.removeClass('is-visible')
//               $('.picture_file_upload').removeClass('file-uploaded').find('.title').removeClass('is-hidden')
//               $('.picture_file_content').removeClass('is-visible').find('b').text('')
//               $('.picture_load').removeClass('is-visible')
//               $('.picture_file').removeClass('is-show')
//             })
//           } else {
//             console.log(data)
//             uploadDocFileMessage( 'error', data )
//           }
//         }
//       }
//     }
//     let formData = new FormData(document.querySelector('#uploadPictureForm'))
//     xhr.send(formData)
//   } else {
//     uploadDocFileMessage( 'error', 'Please, choose a picture!' )
//   }
// })