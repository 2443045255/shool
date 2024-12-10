var section_hight = 0
$(() => {
  section_hight = $('section').height()

})
var main = document.querySelector('main')
main.onresize = function () {
  section_hight = $('section').height()
}
var bodyScrollIndex = 0
var main_scrollActive = false
main.addEventListener('mousewheel', function (event) {
  if (main_scrollActive) { return }
  if (event.deltaY > 0) {
    main_scrollActive = true
    bodyScrollIndex += section_hight
    main.scrollTo({
      top: bodyScrollIndex,
      left: 0,
      behavior: "smooth",
    });

  } else {
    if (main.scrollTop == 0) { return }
    main_scrollActive = true
    bodyScrollIndex -= section_hight
    main.scrollTo({
      top: bodyScrollIndex,
      left: 0,
      behavior: "smooth",
    });
  }
  setTimeout(() => {
    main_scrollActive = false
  }, 400);
})

$(() => {
  $('.carousel_next').click(() => {
    carousel('next')
  })
  $('.carousel_pre').click(() => {
    carousel('pre')
  })

  var active_carousel_index = -100
  var old_carousel_index = 1
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
})