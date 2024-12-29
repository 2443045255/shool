$(function () {
  $('body').append('<div class="top a"><img src="images/lb/pre.png" alt=""></div>')
  $('.top').hide()
  $('.top').bind('click', function () {
    $(document).scrollTop(0)
  })
  $(document).scroll(function () {
    if ($(document).scrollTop() > 100) {
      $('.top').show()
    } else {
      $('.top').hide()
    }
  })
})