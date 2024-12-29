
$(() => {
  $('.carousel_next').click(() => {
    carousel('next')
  })
  $('.carousel_pre').click(() => {
    carousel('pre')
  })
})
var active_carousel_index = -100
function carousel(type) {
  if (type == 'next') {
    if (active_carousel_index == -500) {
      $('.carousel_ul').css({
        'transition': 'none',
        'transform': 'translateX(0vw)'
      })
      document.body.offsetHeight
      active_carousel_index = 0
    }
    active_carousel_index -= 100
    $('.carousel_ul').css({
      'transition': '.4s',
    })
    $('.carousel_ul').css('transform', `translateX(${active_carousel_index}vw)`)
  }
  if (type == 'pre') {
    if (active_carousel_index == 0) {
      $('.carousel_ul').css({
        'transition': 'none',
        'transform': 'translateX(-500vw)'
      })
      document.body.offsetHeight
      active_carousel_index = -500
    }
    active_carousel_index += 100
    $('.carousel_ul').css({
      'transition': '.4s',
    })
    $('.carousel_ul').css('transform', `translateX(${active_carousel_index}vw)`)
  }
}