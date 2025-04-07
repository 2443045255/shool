// ==UserScript==
// @name         学习通下载
// @namespace    http://tampermonkey.net/
// @version      2025-04-07
// @description  try to take over the world!
// @author       You
// @match        https://mooc2-ans.chaoxing.com/mooc2-ans/coursedata/stu-datalist?courseid=249946476&clazzid=114729637*
// @icon         https://www.google.com/s2/favicons?sz=64&domain=chaoxing.com
// @grant        none
// ==/UserScript==

(function () {
  'use strict';
  window.onload = function () {
    setTimeout(() => {
      down_1()
    }, 1000);

  }

  function down_1() {
    var downBtn = document.querySelectorAll("li.operate_down a")
    downBtn.forEach(e => {
      e.addEventListener("click", function (event) {
        event.preventDefault();
        window.open(this.href, "_blank");
      });
    })
    console.log(downBtn);
    if (downBtn.length == 0) {
      let setInterval_1 = setInterval(() => {
        downBtn = document.querySelectorAll("li.operate_down a")
        if (downBtn.length != 0) {
          setInterval_1 = null
          console.log(downBtn);
        }
      }, 100);
    } else {
      setInterval(() => {
        downBtn[0].click()
        console.log("下载");

      }, 500);
    }
  }
  // Your code here...
})();