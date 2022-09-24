"use strict";

var chatbox_content = $('.chat_box_content');
var noChatMessage__icon = '../../../src/assets/icons/no-message(02).png';
var noChatMessage__message = 'No messages available. As soon as you send a message, they appear here.';
var appChatForm = $('.chat_box_form');
var appChatMenuOptions = $('.app__chat_menu > li > button');
var toggleChatEmogiMenu = $('.show__chat-emogi');
var chatVoiceRecorder = $('.app__chat-voice_recorder');
var chatEmogiMenu = $('.app__emogi-menu_container');
var emogiMenuOptions = $('#emogiMenu li button');
var emogiLists = $('.emogi__lists_content');
var emogiItem = $('.emogi__item span');
var chatFileMenu = $('.app__file-menu_container');
var chatFileMenu_options = $('.file_options_menu li button');
var closeFileMenu = $('.close__file_menu');
var appFileBox = $('.app__chat-file_container');
var appFileBox_image = appFileBox.find('.image_file');
var appFileBox_document = appFileBox.find('.document_file'); // var appFileBox_addFile = $('#file')

var uploadFile_message = $('.upload_file__message');
var cancelUploadFile = $('.cancel__upload_file');
var uploadFileForm = $('#uploadFileForm');
var uploadFileForm_file = uploadFileForm.find('#file');
var uploadFileForm_description = uploadFileForm.find('#description');
var uploadFileForm_button = uploadFileForm.find('.btn-primary');
var chatBoxContainer = $('.chat_box_container');
var chatBox = $('.chat_box_content');
var chatForm = $('#appChatForm');
var chatForm_input = chatForm.find('input');
var chatForm_button = chatForm.find('.btn-primary');

function emptyChatHtml(e) {
  if ($.trim(e.html()) === '') {
    e.html("\n      <div class=\"chat_message no_chat_message\">\n        <img src=\"".concat(noChatMessage__icon, "\" alt=\"alt\">\n        <p>").concat(noChatMessage__message, "</p>\n      </div>\n    "));
  }
}

function loadDocumentFile(event) {
  var fileUrl = URL.createObjectURL(event.target.files[0]);
  var fileName = event.srcElement.files[0].name;
  var documentFileUpload = $('.document_file_upload');
  var documentFileUpload_title = documentFileUpload.find('.title');
  var fileContent = $('.file_content');
  var fileContent_name = fileContent.find('b');
  var documentLoad = $('.document_load');
  documentFileUpload.removeClass('file-uploaded');
  documentFileUpload_title.addClass('is-hidden');
  uploadFileForm_button.prop('disabled', true);
  documentLoad.addClass('is-visible');
  fileContent.addClass('is-visible');
  fileContent_name.text(fileName);
  documentFileUpload.delay(2000).queue(function () {
    $(this).addClass('file-uploaded').dequeue();
    uploadFileForm_button.prop('disabled', false);
  });
  console.log(fileUrl); // documentLoad.delay(100).queue(function () {
  //   fileContent.addClass('is-visible').dequeue()
  //   $(this).addClass('is-visible').dequeue()
  //   fileContent_name.text(fileName).dequeue()
  // })
}

function uploadFileMessage(type, message) {
  uploadFile_message.find('p').text(message);
  uploadFile_message.addClass('is-visible').attr('data-message', type);
}

function scrollToBottom() {
  chatBoxContainer.scrollTop(chatBoxContainer.innerHeight());
}

jQuery(document).ready(function () {
  emptyChatHtml(chatbox_content);
}());
appChatMenuOptions.on('click', function () {
  appChatMenuOptions.not(this).removeClass('is-selected');
  $(this).delay(100).queue(function () {
    $(this).toggleClass('is-selected').dequeue();
  });

  switch ($(this).attr('data-option')) {
    case 'emogiMenu':
      chatFileMenu.removeClass('is-show');
      chatEmogiMenu.delay(100).queue(function () {
        $(this).toggleClass('is-show').dequeue();
      });
      break;

    case 'inputFile':
      chatEmogiMenu.removeClass('is-show');
      chatFileMenu.delay(100).queue(function () {
        $(this).toggleClass('is-show').dequeue();
      });
      break;

    case 'voiceRecorder':
      chatEmogiMenu.removeClass('is-show');
      chatFileMenu.removeClass('is-show');
      appAlert('alert', 'This option is not yet available.');
      $('.alert__confirm').on('click', function () {
        $('.app__chat_menu > li > button[data-option="voiceRecorder"]').removeClass('is-selected');
      }); // .delay(100).queue(function () {
      //   $(this).toggleClass('is-show').dequeue()
      // })

      break;
  }
});
chatBox.on('click', function () {
  if (chatEmogiMenu.hasClass('is-show')) {
    chatEmogiMenu.removeClass('is-show');
    appChatMenuOptions.first().removeClass('is-selected'); // emogiLists.scrollTop(0)
    // emogiMenuOptions.first().click()
  }
});
emogiMenuOptions.first().addClass('is-selected');
emogiLists.first().addClass('is-show');

function showEmogiList(e) {
  emogiLists.scrollTop(0);
  emogiLists.not($('#' + e + '')).removeClass('is-show');
  $('#' + e + '').delay(100).queue(function () {
    $(this).addClass('is-show').dequeue();
  });
}

emogiMenuOptions.on('click', function () {
  var list = $(this).attr('data-menu');
  emogiMenuOptions.not(this).removeClass('is-selected');
  $(this).delay(100).queue(function () {
    $(this).addClass('is-selected').dequeue();
  });
  showEmogiList(list);
});
emogiItem.on('click', function () {
  var emogi = $(this).text();
  var value = chatForm_input.val();
  chatForm_input.val(value + emogi);
  chatForm_input.focus();
});
closeFileMenu.on('click', function () {
  chatFileMenu.delay(100).queue(function () {
    $(this).removeClass('is-show').dequeue();
    $('.app__chat-image_file').removeClass('is-selected').dequeue();
  });
});
chatFileMenu_options.on('click', function () {
  appAlert('alert', 'This option is not yet available.');
  return false;
  chatFileMenu.removeClass('is-show');
  $('.app__chat-image_file').removeClass('is-selected');
  appFileBox.delay(100).queue(function () {
    $(this).addClass('is-show').dequeue();
  });

  switch ($(this).attr('data-option')) {
    case 'image':
      appFileBox_image.addClass('is-show');
      break;

    case 'document':
      appFileBox_document.addClass('is-show');
      uploadFileForm_file.delay(200).queue(function () {
        $(this).click().dequeue();
      });
      break;

    case 'video':
      break;
  }
});
cancelUploadFile.on('click', function () {
  appFileBox.delay(100).queue(function () {
    $(this).removeClass('is-show').dequeue();
    uploadFile_message.removeClass('is-visible');
    $('.document_file_upload').removeClass('file-uploaded').find('.title').removeClass('is-hidden');
    $('.file_content').removeClass('is-visible').find('b').text('');
    $('.document_load').removeClass('is-visible');
    $('.image_file, .document_file').removeClass('is-show');
  });
});
chatbox_content.on('click', function () {
  if (appFileBox.hasClass('is-show')) {
    cancelUploadFile.click();
  }
});
uploadFileForm.submit(function (e) {
  e.preventDefault();
});
uploadFileForm_button.on('click', function () {
  if (uploadFileForm_file.val() !== '') {
    console.log(uploadFileForm_file.val());
  } else {
    uploadFileMessage('error', 'Please, choose a file!');
  }
});
chatForm.submit(function (e) {
  e.preventDefault();
});
chatForm_input.keyup(function () {
  if ($(this).val() !== '') {
    chatForm_button.prop('disabled', false);
  } else {
    chatForm_button.prop('disabled', true);
  }
});
chatForm_button.on('click', function () {
  if (chatForm_input.val() !== '') {
    chatForm_input.val('');
    scrollToBottom();
  } else {
    chatForm_input.focus();
  }
});
chatBoxContainer.mouseenter(function () {
  $(this).addClass('is-focus');
});
chatBoxContainer.mouseleave(function () {
  $(this).removeClass('is-focus');
  scrollToBottom();
});
$(document).keypress(function (e) {
  if (!$('.app_alert').hasClass('is-show')) {
    if (e.which === 13) {
      e.preventDefault();
      chatForm_button.click();
    }
  }
});