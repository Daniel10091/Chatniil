var peopleLists_menu = $('menu#peopleLists_menu li button')

var peopleSearch = $('#appPeopleSearch')
var peopleSearch_input = peopleSearch.find('input')

var peopleLists = $('.people_lints-content section')
var allPeopleList = $('[data-list="all-people"]')
var allPeopleListContent = $('.all_people_list-content')
var recentPeopleList = $('[data-list="recent-people"]')
var recentPeopleListContent = $('.recent_people_list-content')
var activePeopleList = $('[data-list="active-people"]')
var activePeopleListContent = $('.active_people_list-content')

// var emptyList__icon = './src/assets/icons/message-box.png'
// var emptyList__message = 'No person is currently available.'
// var searchList__icon = './src/assets/icons/research.webp'
// var searchList__message = 'No users found related to your search term.'
// var noPeopleList__icon = './src/assets/icons/question-mark.png'
// var noPeopleList__message = 'No users are currently active.'
// var noRecentPeopleList__icon = './src/assets/icons/no-message(02).png'
// var noRecentPeopleList__message = 'There are no recent conversations.'

var listPerson_link = $('a.list_person-link')
var appChatbox_iframe = $('#app__chat_box-iframe')

peopleLists_menu.first().addClass('is-selected')
allPeopleList.addClass('is-show')

function allPeopleListHtml () {
  let xhr = new XMLHttpRequest()

  xhr.open('GET', './src/php/all-people/all-people.php', true)
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response

        if (!allPeopleListContent.hasClass('search')) {
          allPeopleListContent.html(data)
        }
      }
    }
  }
  xhr.send()
}

function recentPeopleListHtml () {
  let xhr = new XMLHttpRequest()

  xhr.open('GET', './src/php/recent-people/recent-people.php', true)
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response

        recentPeopleListContent.html(data)
      }
    }
  }
  xhr.send()
}

function activePeopleListHtml () {
  let xhr = new XMLHttpRequest()

  xhr.open('GET', './src/php/active-people/active-people.php', true)
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response
        
        activePeopleListContent.html(data)
      }
    }
  }
  xhr.send()
}

jQuery(document).ready(function () {
  allPeopleListHtml()
  recentPeopleListHtml()
  activePeopleListHtml()
}())

setInterval(function () {
  allPeopleListHtml()
  recentPeopleListHtml()
  activePeopleListHtml()
}, 500)

peopleSearch.submit(function (e) {
  e.preventDefault()
})

peopleSearch_input.keyup(function () {
  var searchTerm = $(this).val()

  if (searchTerm !== '') {
    allPeopleListContent.addClass('search')
  } else {
    allPeopleListContent.removeClass('search')
  }
  
  let xhr = new XMLHttpRequest()

  xhr.open('POST', './src/php/person-search/person-search.php', true)
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response

        allPeopleListContent.html(data)
      }
    }
  }
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
  xhr.send('searchTerm=' + searchTerm)
})

peopleLists_menu.on('click', function () {
  peopleLists_menu.not(this).removeClass('is-selected')
  $(this).delay(100).queue(function () {
    $(this).addClass('is-selected').dequeue()
  })
  switch ($(this).attr('data-option')) {
    case 'show__all_people-list':
      peopleLists.not(allPeopleList).removeClass('is-show')
      allPeopleListHtml(allPeopleListContent)
      allPeopleList.delay(100).queue(function () {
        $(this).addClass('is-show').dequeue()
      })
      break;
    case 'show__recent_people-list':
      peopleLists.not(recentPeopleList).removeClass('is-show')
      recentPeopleListHtml(recentPeopleListContent)
      recentPeopleList.delay(100).queue(function () {
        $(this).addClass('is-show').dequeue()
      })
      break;
    case 'show__active_people-list':
      peopleLists.not(activePeopleList).removeClass('is-show')
      activePeopleListHtml(activePeopleListContent)
      activePeopleList.delay(100).queue(function () {
        $(this).addClass('is-show').dequeue()
      })
      break;
  }
})

$(document).on('click', 'a.list_person-link', function (e) {
  e.preventDefault()
  var person_id = $(this).attr('data-id')
  var link = './src/ChatBox-component/chatbox.php?person_id='
  var address = link + person_id

  if (appChatbox_iframe.attr('src') === '') {
    appChatbox_iframe.attr('src', address)
    appChatbox_iframe.delay(100).queue(function () {
      $(this).addClass('is-show').dequeue()
    })
    $('body.app__body').addClass('app__show-chat_box-iframe')
  } else if (appChatbox_iframe.attr('src') !== address) {
    appChatbox_iframe.attr('src', address)
  }
})