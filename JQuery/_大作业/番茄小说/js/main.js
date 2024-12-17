$(() => {
  $(window).on('scroll', function () {
    if ($(window).scrollTop() > 10) {
      $('header').css('background-color', '#fff')
    } else {
      $('header').css('background-color', 'transparent')
    }
  })
})