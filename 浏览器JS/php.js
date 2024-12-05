// ==UserScript==
// @name         自选题目数量
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

  function CreateUserUI() {
    var RxaserDiv = document.createElement('div')
    RxaserDiv.style.cssText = `
    position: fixed;
    top: 20px;
    left: 20px;
    width: 300px;
    height: 100px;
    `
    var div1 = document.createElement('div')
    div1.style.cssText = `
    display: flex;
    align-items: center;
    `
    var div1_input = document.crea
  }
  // Your code here...
})();