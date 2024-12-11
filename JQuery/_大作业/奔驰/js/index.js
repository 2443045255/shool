var section_hight = 0
var section_length = 0
var mainScrollVal = 0

document.body.onresize = function () {
  修正滚动距离()
}

$(() => {
  section_hight = $('section').height()
  section_length = $('section').length - 1
})

var main = document.querySelector('main')
var mainScrollIndex = 0



function 修正滚动距离() {
  section_hight = $('section').height()
  main.scrollTop = mainScrollIndex * section_hight
}

var main_scrollActive = false
main.addEventListener('mousewheel', function (event) {
  if (main_scrollActive) { return }
  if (event.deltaY > 0) {
    if (main.scrollTop == section_hight * section_length) { return }
    main_scrollActive = true
    mainScrollIndex++
    main.scrollTo({
      top: mainScrollIndex * section_hight,
      left: 0,
      behavior: "smooth",
    });

  } else {
    if (main.scrollTop == 0) { return }
    main_scrollActive = true
    mainScrollIndex--
    main.scrollTo({
      top: mainScrollIndex * section_hight,
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