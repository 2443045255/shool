// ==UserScript==
// @name         PHP on Exercism自选题目数量
// @namespace    http://tampermonkey.net/
// @version      2024-12-05
// @description  try to take over the world!
// @author       You
// @match        https://exercism.org/tracks/php
// @icon         https://www.google.com/s2/favicons?sz=64&domain=exercism.org
// @grant        none
// ==/UserScript==

(function () {
  'use strict';

  setTimeout(() => {
    console.log('题目自选脚本')
    CreateUserUI()

  }, 1000);
  var Rxaser = document.createElement('div')
  Rxaser.style.cssText = `
  padding: 10px;border-radius: 6px;position: fixed;top: 0px;left: 0px;background: rgba(255, 255, 255, 0.6);backdrop-filter: blur(3px);z-index:100;
  `
  Rxaser.innerHTML = `
  <div class="Rxaser-div1">
    <p class="Rxaser-div1-title" style="font-size: 12px;color: rgb(84, 84, 84);">完成多少题</p>
    <div class="Rxaser-div1-body" style="margin-top: 8px;">
      <input type="text" style="padding: 3px 5px;outline: none;border-radius: 4px;border: 1px solid;">
      <button id="Rxaser-btn1" style="padding: 5px 15px;border-radius: 4px;border: 1px solid;">确认</button>
    </div>
  </div>
  <div class="Rxaser-div2" style="margin-top: 10px;">
    <p class="Rxaser-div1-title" style="font-size: 12px;color: rgb(84, 84, 84);">老师的题目</p>
    <div class="Rxaser_div1-body" style="margin-top: 8px;">
      <button id="Rxaser-btn2" style="padding: 5px 15px;border-radius: 4px;border: 1px solid;">确认</button>
    </div>
  </div>
  `
  var opacityTime = null
  Rxaser.onmouseenter = function () {
    Rxaser.style.opacity = 1
    clearTimeout(opacityTime)
  }
  Rxaser.onmouseleave = function () {
    opacityTime = setTimeout(() => {
      Rxaser.style.opacity = 0
    }, 1000);
  }
  function CreateUserUI() {
    document.body.append(Rxaser)
    写入事件()
  }

  function 写入事件() {
    var Rxaser_btn1 = document.getElementById('Rxaser-btn1')
    Rxaser_btn1.onclick = function () {

      完成题目()
    }
    var Rxaser_btn2 = document.getElementById('Rxaser-btn2')
    Rxaser_btn2.onclick = function () {
      老师的题目()
    }
  }

  function 完成题目() {
    var input1 = document.querySelector('.Rxaser-div1-body input')
    var input1_value = parseInt(input1.value)

    var progress_title = document.querySelector('.progress-chart>h2>em')
    var progress_bar = document.querySelector('.progress-chart>.c-progress>.bar')
    var progress_liALl = document.querySelectorAll('.progress-chart .exercises a')

    var Completed = document.querySelector('.progress-chart>.key>.item:nth-child(1)>.count')
    var progress = document.querySelector('.progress-chart>.key>.item:nth-child(2)>.count')
    var Available = document.querySelector('.progress-chart>.key>.item:nth-child(3)>.count')

    var stats_box_info = document.querySelector('.stats-box>.info>.count')
    if (input1_value) {
      var comNum = ((input1_value / 110).toFixed(3) * 1000) / 10
      progress_title.innerText = comNum + '%'
      progress_bar.style.width = comNum + '%'

      progress_liALl.forEach((e, index) => {
        if (index < input1_value) {
          if (e.classList.contains('--started')) {
            e.classList.remove('--started')
            e.classList.add('--completed')
          }
          if (e.classList.contains('--available')) {
            e.classList.remove('--available')
            e.classList.add('--completed')
          }
        }
        var lastLI = progress_liALl[input1_value]
        lastLI.classList.remove('--available')
        lastLI.classList.add('--started')
        if (index > input1_value) {
          e.classList.remove('--completed')
          e.classList.add('--available')
        }
      })
      Completed.innerText = input1_value
      Available.innerText = 110 - input1_value
      stats_box_info.innerText = input1_value
    }
  }
  function 老师的题目() {
    var progress_title = document.querySelector('.progress-chart>h2>em')
    var progress_bar = document.querySelector('.progress-chart>.c-progress>.bar')
    var progress_liALl = document.querySelectorAll('.progress-chart .exercises a')

    var Completed = document.querySelector('.progress-chart>.key>.item:nth-child(1)>.count')
    var progress = document.querySelector('.progress-chart>.key>.item:nth-child(2)>.count')
    var Available = document.querySelector('.progress-chart>.key>.item:nth-child(3)>.count')

    var stats_box_info = document.querySelector('.stats-box>.info>.count')

    var 老师题目 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 20, 23, 24, 25, 26, 31, 32, 33, 34, 35]

    var comNum = ((老师题目.length / 110).toFixed(3) * 1000) / 10
    progress_title.innerText = comNum + '%'
    progress_bar.style.width = comNum + '%'

    Completed.innerText = 老师题目.length
    progress.innerText = 1
    Available.innerText = 110 - 老师题目.length
    stats_box_info.innerText = 老师题目.length

    for (let i = 0; i <= 老师题目.length - 1; i++) {
      var e = progress_liALl[老师题目[i] - 1]
      if (e.classList.contains('--started')) {
        e.classList.remove('--started')
        e.classList.add('--completed')
      }
      if (e.classList.contains('--available')) {
        e.classList.remove('--available')
        e.classList.add('--completed')
      }
    }

    var first_available = false
    progress_liALl.forEach((e, index) => {
      if (e.classList.contains('--available') && !first_available) {
        e.classList.remove('--available')
        e.classList.add('--started')
        first_available = true
      } else if (e.classList.contains('--started')) {
        if (!first_available) {
          first_available = true
        }else{
          e.classList.remove('--started')
        e.classList.add('--available')
        }

      }
    })

  }

  // Your code here...
})();