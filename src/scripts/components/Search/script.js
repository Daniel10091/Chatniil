var peopleSearch = $('.app__people_search')
var peopleSearch__input = $('.app__people_search input')

peopleSearch.submit(function (e) {
  e.preventDefault()
})

peopleSearch__input.keyup(function (e) {
  if (!allPeopleList.hasClass('is-show')) {
    $('button[data-option="show__all_people-list"]').click()
  }
  // allPeopleListHtml(allPeopleListContent)
})