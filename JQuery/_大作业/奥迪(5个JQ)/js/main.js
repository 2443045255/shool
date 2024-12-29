$(function () {
  $('body').append(`<div class="goTop">↑</div>`)
  $(document).scroll(function () {
    console.log(123)
    if ($(document).scrollTop() > 100) {
      $('.goTop').css('display', 'block')
    } else {
      $('.goTop').css('display', 'none')
    }
  })
  $('.goTop').click(function () {
    $(document).scrollTop(0)
  })
})