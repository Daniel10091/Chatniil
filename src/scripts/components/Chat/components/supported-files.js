function loadPictureFile ( event ) {
  if (pic__uploadFileForm_file.val() !== '') {
    var fileUrl = URL.createObjectURL(event.target.files[0])
    
    console.log(fileUrl)
    
    var fileName = event.srcElement.files[0].name
    var documentFileUpload = $('.picture_file_upload')
    var documentFileUpload_title = documentFileUpload.find('.title')
    var filePreview = $('.picture_file_preview')
    var fileContent = $('.picture_file_content')
    var fileContent_name = fileContent.find('b')
    var documentLoad = $('.picture_load')
  
    documentFileUpload.removeClass('file-uploaded unsupported-file')
    documentFileUpload_title.addClass('is-hidden')
    pic__uploadFileForm_button.prop('disabled', true)
  
    documentLoad.addClass('is-visible')
    filePreview.removeClass('is-visible').find('img').attr('src', '')
    fileContent.addClass('is-visible')
    fileContent_name.text(fileName)
    
    let xhr = new XMLHttpRequest()
  
    xhr.open('POST', '../php/chat/picFile-types.php', true)
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response
  
          if (data === 'File uploaded!') {
            documentFileUpload.delay(2000).queue(function () {
              $(this).addClass('file-uploaded').dequeue()
              filePreview.addClass('is-visible').find('img').attr('src', fileUrl)
              pic__uploadFileForm_button.prop('disabled', false)
              uploadPicFileMessage( 'success', data )
            })
          } else {
            documentFileUpload.delay(2000).queue(function () {
              $(this).addClass('unsupported-file').dequeue()
              pic__uploadFileForm_button.prop('disabled', false)
              uploadPicFileMessage( 'error', data )
            })
          }
        }
      }
    }
    let formData = new FormData(document.querySelector('#uploadPictureForm'))
    xhr.send(formData)
  }
}

function loadDocumentFile ( event ) {
  if (doc__uploadFileForm_file.val() !== '') {
    var fileUrl = URL.createObjectURL(event.target.files[0])
    var fileName = event.srcElement.files[0].name
    var documentFileUpload = $('.document_file_upload')
    var documentFileUpload_title = documentFileUpload.find('.title')
    var fileContent = $('.document_file_content')
    var fileContent_name = fileContent.find('b')
    var documentLoad = $('.document_load')
  
    documentFileUpload.removeClass('file-uploaded unsupported-file')
    documentFileUpload_title.addClass('is-hidden')
    doc__uploadFileForm_button.prop('disabled', true)
  
    documentLoad.addClass('is-visible')
    fileContent.addClass('is-visible')
    fileContent_name.text(fileName)
    
    let xhr = new XMLHttpRequest()
  
    xhr.open('POST', '../php/chat/docFile-types.php', true)
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response
  
          if (data === 'File uploaded!') {
            documentFileUpload.delay(2000).queue(function () {
              $(this).addClass('file-uploaded').dequeue()
              doc__uploadFileForm_button.prop('disabled', false)
              uploadDocFileMessage( 'success', data )
            })
          } else {
            documentFileUpload.delay(2000).queue(function () {
              $(this).addClass('unsupported-file').dequeue()
              doc__uploadFileForm_button.prop('disabled', false)
              uploadDocFileMessage( 'error', data )
            })
          }
        }
      }
    }
    let formData = new FormData(document.querySelector('#uploadDocumentForm'))
    xhr.send(formData)
  }
}