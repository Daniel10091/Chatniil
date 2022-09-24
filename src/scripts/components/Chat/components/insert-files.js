const pic__fileForm = document.querySelector('#uploadPictureForm')
const pic__fileForm_incoming_id = pic__fileForm.querySelector('.incoming_id').value
const pic__fileForm_file = pic__fileForm.querySelector('#picture')
const pic__fileForm_inputField = pic__fileForm.querySelector('#message')
const pic__fileForm_sendButton = pic__fileForm.querySelector('.btn-primary')

const doc__fileForm = document.querySelector('#uploadDocumentForm')
const doc__fileForm_incoming_id = doc__fileForm.querySelector('.incoming_id').value
const doc__fileForm_file = doc__fileForm.querySelector('#document')
const doc__fileForm_inputField = doc__fileForm.querySelector('#message')
const doc__fileForm_sendButton = doc__fileForm.querySelector('.btn-primary')

pic__fileForm.onsubmit = (e) => {
  e.preventDefault()
}

pic__fileForm_sendButton.onclick = () => {
  if (pic__fileForm_file.value !== '') {
    let xhr = new XMLHttpRequest()
  
    xhr.open('POST', '../php/chat/picture-insert.php', true)
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response
  
          if (data === 'success') {
            new Audio('../assets/audios/send.mp3').play()
            scrollToBottom()
            pic__cancelUploadFile.click()
          } else {
            uploadPicFileMessage( 'error', data )
          }
        }
      }
    }
    let formData = new FormData(pic__fileForm)
    xhr.send(formData)
  } else {
    uploadPicFileMessage( 'error', 'Please, choose a file!' )
  }
}

doc__fileForm.onsubmit = (e) => {
  e.preventDefault()
}

doc__fileForm_sendButton.onclick = () => {
  if (doc__fileForm_file.value !== '') {
    let xhr = new XMLHttpRequest()
  
    xhr.open('POST', '../php/chat/document-insert.php', true)
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response
  
          if (data === 'success') {
            new Audio('../assets/audios/send.mp3').play()
            scrollToBottom()
            doc__cancelUploadFile.click()
          } else {
            uploadDocFileMessage( 'error', data )
          }
        }
      }
    }
    let formData = new FormData(doc__fileForm)
    xhr.send(formData)
  } else {
    uploadDocFileMessage( 'error', 'Please, choose a file!' )
  }
}