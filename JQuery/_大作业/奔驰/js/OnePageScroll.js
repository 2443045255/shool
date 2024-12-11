var section_hight = 0
var section_length = 0
var mainScrollVal = 0

window.addEventListener('resize', function () {
  修正滚动距离()
})

$(() => {
  section_hight = $('section').height()
  section_length = $('section').length - 1
})

var main = document.querySelector('main')
var mainScrollIndex = 0

function 修正滚动距离() {
  console.log("修正滚动距离");
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
  main.onscrollend = function () {
    main_scrollActive = false
  }
})