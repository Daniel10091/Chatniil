const personInfo = document.querySelector('#personInfo')
const person_id = document.querySelector('.person_id').value

const chatBox_Container = document.querySelector('.chat_box_container')
const chatBoxContent = document.querySelector('.chat_box_content')

const form = document.querySelector('#appChatForm')
const incoming_id = form.querySelector('.incoming_id').value
const inputField = form.querySelector('#message')
const sendButton = form.querySelector('.btn-primary')

function personInfoHTML () {
  let xhr = new XMLHttpRequest()

  xhr.open('POST', '../php/chat/chat-person.php', true)
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response

        personInfo.innerHTML = data
      }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
  xhr.send("person_id=" + person_id)
}
personInfoHTML()

setInterval(() => {
  personInfoHTML()
}, 1000)

form.onsubmit = (e) => {
  e.preventDefault()
}

sendButton.onclick = () => {
  let xhr = new XMLHttpRequest()

  xhr.open('POST', '../php/chat/chat-insert.php', true)
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response

        if (data === 'success') {
          inputField.value = ""
          new Audio('../assets/audios/send.mp3').play()
          scrollToBottom()
        }
      }
    }
  }
  let formData = new FormData(form)
  xhr.send(formData)
}

setInterval(() => {
  let xhr = new XMLHttpRequest()

  xhr.open('POST', '../php/chat/chat-get.php', true)
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response

        chatBoxContent.innerHTML = data
        if (!chatBox_Container.classList.contains('is-focus')) {
          scrollToBottom()
        }
      }
    }
  }
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
  xhr.send('incoming_id=' + incoming_id)
}, 300)