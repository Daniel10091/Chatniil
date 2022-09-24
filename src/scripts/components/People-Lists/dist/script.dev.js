"use strict";

var peopleLists_menu = $('menu#peopleLists_menu li button');
var peopleLists = $('.people_lints-content section');
var allPeopleList = $('[data-list="all-people"]');
var allPeopleListContent = $('.all_people_list-content');
var recentPeopleList = $('[data-list="recent-people"]');
var recentPeopleListContent = $('.recent_people_list-content');
var activePeopleList = $('[data-list="active-people"]');
var activePeopleListContent = $('.active_people_list-content');
var emptyList__icon = './src/assets/icons/message-box.png';
var emptyList__message = 'No person is currently available.';
var searchList__icon = './src/assets/icons/research.webp';
var searchList__message = 'No users found related to your search term.';
var noPeopleList__icon = './src/assets/icons/question-mark.png';
var noPeopleList__message = 'No users are currently active.';
var noRecentPeopleList__icon = './src/assets/icons/no-message(02).png';
var noRecentPeopleList__message = 'There are no recent conversations.';
var listPerson_link = $('a.list_person-link');
var appChatbox_iframe = $('#app__chat_box-iframe');
peopleLists_menu.first().addClass('is-selected');
allPeopleList.addClass('is-show');

function allPeopleListHtml(e) {
  if ($.trim(e.html()) === '') {
    e.html("\n      <div class=\"list_message empty_list-message\">\n        <img src=\"".concat(emptyList__icon, "\" alt=\"alt\">\n        <p>").concat(emptyList__message, "</p>\n      </div>\n    "));
  }
}

function recentPeopleListHtml(e) {
  if ($.trim(e.html()) === '') {
    e.html("\n      <div class=\"list_message empty_list-message\">\n        <img src=\"".concat(noRecentPeopleList__icon, "\" alt=\"alt\">\n        <p>").concat(noRecentPeopleList__message, "</p>\n      </div>\n    "));
  }
}

function activePeopleListHtml(e) {
  if ($.trim(e.html()) === '') {
    e.html("\n      <div class=\"list_message empty_list-message\">\n        <img src=\"".concat(noPeopleList__icon, "\" alt=\"alt\">\n        <p>").concat(noPeopleList__message, "</p>\n      </div>\n    "));
  }
}

jQuery(document).ready(function () {
  allPeopleListHtml(allPeopleListContent);
  recentPeopleListHtml(recentPeopleListContent);
  activePeopleListHtml(activePeopleListContent);
}()); // jQuery(document).ready(function () {
//   if ($.trim(allPeopleListContent.html()) === '') {
//     allPeopleListContent.html(`
//       <div class="list_message empty_list-message">
//         <img src="${emptyList__icon}" alt="alt">
//         <p>${emptyList__message}</p>
//       </div>
//     `)
//   }
//   if ($.trim(recentPeopleListContent.html()) === '') {
//     recentPeopleListContent.html(`
//       <div class="list_message empty_list-message">
//         <img src="${noRecentPeopleList__icon}" alt="alt">
//         <p>${noRecentPeopleList__message}</p>
//       </div>
//     `)
//   }
//   if ($.trim(activePeopleListContent.html()) === '') {
//     activePeopleListContent.html(`
//       <div class="list_message empty_list-message">
//         <img src="${noPeopleList__icon}" alt="alt">
//         <p>${noPeopleList__message}</p>
//       </div>
//     `)
//   }
// }())
// allPeopleList.load('url', 'data', function (response, status, request) {
//   console.log('load')
// })

peopleLists_menu.on('click', function () {
  peopleLists_menu.not(this).removeClass('is-selected');
  $(this).delay(100).queue(function () {
    $(this).addClass('is-selected').dequeue();
  });

  switch ($(this).attr('data-option')) {
    case 'show__all_people-list':
      peopleLists.not(allPeopleList).removeClass('is-show');
      allPeopleListHtml(allPeopleListContent);
      allPeopleList.delay(100).queue(function () {
        $(this).addClass('is-show').dequeue();
      });
      break;

    case 'show__recent_people-list':
      peopleLists.not(recentPeopleList).removeClass('is-show');
      recentPeopleListHtml(recentPeopleListContent);
      recentPeopleList.delay(100).queue(function () {
        $(this).addClass('is-show').dequeue();
      });
      break;

    case 'show__active_people-list':
      peopleLists.not(activePeopleList).removeClass('is-show');
      activePeopleListHtml(activePeopleListContent);
      activePeopleList.delay(100).queue(function () {
        $(this).addClass('is-show').dequeue();
      });
      break;
  }
});
listPerson_link.on('click', function (e) {
  e.preventDefault();
  var address = $(this).attr('href');

  if (appChatbox_iframe.attr('src') === '') {
    appChatbox_iframe.attr('src', address);
    appChatbox_iframe.delay(100).queue(function () {
      $(this).addClass('is-show').dequeue();
    });
    $('body.app__body').addClass('app__show-chat_box-iframe');
  } else if (appChatbox_iframe.attr('src') !== address) {
    appChatbox_iframe.attr('src', address);
  }
});