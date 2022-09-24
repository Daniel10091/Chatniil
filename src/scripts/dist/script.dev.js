"use strict";

var amountPeople = $('#amountPeople');
var appOptions = $('.show__app_options');
var appOptions_menu = $('.app__options_menu');
var appOptions_option = $('.app__options_menu menu li button');
amountPeople.text('(' + $('ul.all_people_list-content li').length + ')');
setInterval(function () {
  amountPeople.text('(' + $('ul.all_people_list-content li').length + ')');
}, 500);
appOptions.on('click', function () {
  $(this).addClass('is-hidden');
  appOptions_menu.addClass('is-show');
});
appOptions_menu.mouseleave(function () {
  appOptions.removeClass('is-hidden');
  $(this).delay(100).queue(function () {
    $(this).removeClass('is-show').dequeue();
  });
});
appOptions_option.click(function () {
  appOptions.removeClass('is-hidden');
  appOptions_menu.delay(100).queue(function () {
    $(this).removeClass('is-show').dequeue();
  });
}); // function submit_form () {
//   var data=(JSON.stringify($('form').serializeObject()))
//   return false
// }
// $.fn.serializeObject = function () {
//   var o = {}
//   var a = this.serializeArray()
//   $.each(a, function () {
//     if (o[this.name] !== undefined) {
//       if (!o[this.name].push) {
//         o[this.name] = [o[this.name]]
//       }
//       o[this.name].push(this.value || '')
//     } else {
//       o[this.name] = this.value || ''
//     }
//   })
//   return o
// }
// $(".add__new_people").click(function () {
//   submit_form()
//   $.ajax({
//     type: 'POST', 
//     dataType: 'json', 
//     url: 'storage.json', 
//     data: data, 
//     success: function(data) { 
//       alert(data.message)
//     },
//     failure: function (data) {
//       alert('Please try again')
//     }
//   })
// })