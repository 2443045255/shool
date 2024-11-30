<template>
  <main>
    <h2>首页</h2>
    <section>
      <div class="module">
        <div class="module-title">
          <span>展开隐藏、轮播图、倒计时(文本插值、v-for)</span>
          <div class="module-btn-group">
            <button class="module-btn module-hide-btn" v-show="moduleShow[0]">收起</button>
            <button class="module-btn module-show-btn" v-show="!moduleShow[0]">展开</button>
          </div>
        </div>
        <div class="module-body" :class="{ 'module-hide': !moduleShow[0] }">
          <div class="轮播图" @mouseover="自动轮播图(false)" @mouseout="自动轮播图(true)">
            <div class="轮播图-ul">
              <img :src="imgUrls[old轮播图active]">
            </div>
            <div class="轮播图-time">
              <span>倒计时：</span>
              <span>{{ 轮播图time }}</span>
            </div>
            <div class="轮播图-chose">
              <div v-for="(key, index) in imgUrls" :key="key" :class="{ active: 轮播图active == index }"
                @click="轮播图切换(index)"><img :src="key" class="轮播图-img"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="module">
        <div class="module-title">
          <span>展开隐藏、表单验证、列表展示、隔行换色(文本插值、v-for、v-model)</span>
          <div class="module-btn-group">
            <button class="module-btn module-hide-btn" v-show="moduleShow[1]">收起</button>
            <button class="module-btn module-show-btn" v-show="!moduleShow[1]">展开</button>
          </div>
        </div>
        <div class="module-body" :class="{ 'module-hide': !moduleShow[1] }">
          <div class="flex" style="align-items: center;justify-content: center;">
            <div class="input-group">
              <span>书名:</span>
              <input type="text" class="input-large" v-model="book['name']">
            </div>
            <div class="input-group">
              <span>价格:</span>
              <input type="number" class="input-large" min="1" v-model="book['price']">
              <span>元</span>
            </div>
            <div class="input-group">
              <span>数量:</span>
              <input type="number" class="input-large" min="1" v-model="book['num']">
            </div>

            <button class="large-btn" style="margin-left: 20px;" @click="addBook()"
              :class="{ lock: !book['name'] }">添加</button>
          </div>

          <div class="pre">
            <h4 class="pre-title">预览</h4>
            <div class="pre-body">
              <div class="book-li">
                <div class="book-name">{{ bookArr[0][0] }}</div>
                <div class="book-price">{{ bookArr[0][1] }}</div>
                <div class="book-num">{{ bookArr[0][2] }}</div>
              </div>
              <div class="book-li">
                <div class="book-name">{{ book['name'] }}</div>
                <div class="book-price">{{ book['price'] }}</div>
                <div class="book-num">{{ book['num'] }}</div>
              </div>
            </div>
          </div>


          <div class="scroll">
            <div class="book-ul">
              <div class="book-li" v-for="key in bookArr" :key="key">
                <div class="book-name">{{ key[0] }}</div>
                <div class="book-price">{{ key[1] }}</div>
                <div class="book-num">{{ key[2] }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="module">
        <div class="module-title">
          <span>图文混排</span>
          <div class="module-btn-group">
            <button class="module-btn module-hide-btn" v-show="moduleShow[2]">收起</button>
            <button class="module-btn module-show-btn" v-show="!moduleShow[2]">展开</button>
          </div>
        </div>
        <div class="module-body" :class="{ 'module-hide': !moduleShow[2] }">
          <div class="card" style="padding-bottom: 10px;">
            <div class="card-img" style="margin-right: 10px;"><img src="/public/images/vue.svg" alt=""></div>
            <div class="card-txt">
              <h4>Vue</h4>
              <p>Vue 是一款用于构建用户界面的 JavaScript 框架。它基于标准 HTML、CSS 和 JavaScript
                构建，并提供了一套声明式的、组件化的编程模型，帮助你高效地开发用户界面。无论是简单还是复杂的界面，Vue 都可以胜任。</p>
            </div>
          </div>
          <div class="card" style="padding-bottom: 10px;flex-direction: row-reverse;">
            <div class="card-img" style="margin-left: 10px;"><img src="/public/images/vue.svg" alt=""></div>
            <div class="card-txt" style="text-align: right;">
              <h4>Vue</h4>
              <p>Vue 是一款用于构建用户界面的 JavaScript 框架。它基于标准 HTML、CSS 和 JavaScript
                构建，并提供了一套声明式的、组件化的编程模型，帮助你高效地开发用户界面。无论是简单还是复杂的界面，Vue 都可以胜任。</p>
            </div>
          </div>
        </div>
      </div>

    </section>
  </main>
</template>
<script setup>
import { onMounted, onUnmounted, ref } from 'vue';


window.onload = function () {
  同步高宽(document.querySelectorAll(".轮播图-img"))
}

const 轮播图time = ref(3)
var 轮播图setInterval = null
onMounted(() => {
  同步高宽(document.querySelectorAll(".轮播图-img"))
  自动轮播图(true)

  document.querySelectorAll(".module-body").forEach((element, index) => {
    element.style.height = element.scrollHeight + "px"
  })

  document.querySelectorAll(".module-hide-btn").forEach((element, index) => {
    element.onclick = function () {
      moduleShow.value[index] = false
    }
  })
  document.querySelectorAll(".module-show-btn").forEach((element, index) => {
    element.onclick = function () {
      moduleShow.value[index] = true
    }
  })
})
onUnmounted(() => {
  自动轮播图(false)
})
const 轮播图active = ref(0)
const old轮播图active = ref(0)
const imgUrls = [
  "/public/images/01.jpg",
  "/public/images/02.jpg",
  "/public/images/03.jpg",
  "/public/images/04.jpg",
]
function 自动轮播图(value) {
  if (value) {
    轮播图setInterval = setInterval(() => {
      轮播图time.value--
      if (轮播图time.value == 0) {
        轮播图active.value + 1 == 4 ? 轮播图active.value = 0 : 轮播图active.value++
        轮播图切换(轮播图active.value)
        轮播图time.value = 3
      }
    }, 1000);
  } else {
    clearInterval(轮播图setInterval)
  }
}

function 轮播图切换(value) {
  if (!document.querySelector(".轮播图-ul")) return
  轮播图active.value = value
  var new轮播图img = document.createElement("img")
  new轮播图img.className = "new轮播图img"
  new轮播图img.src = imgUrls[轮播图active.value]
  document.querySelector(".轮播图-ul").append(new轮播图img)
  setTimeout(() => {
    new轮播图img.remove()
    old轮播图active.value = value
  }, 400);
}
function 同步高宽(arrValue) {
  // var arrValue1 = document.getElementById("")
  var firstHeight = arrValue[0].offsetWidth
  if (firstHeight != 0) {
    arrValue.forEach(element => {
      element.style.width = firstHeight + "px"
    });
  }
}


const book = ref({
  "name": '西游记',
  "price": 1,
  "num": 1
})


const bookArr = ref([
  ["书名", "价格", "数量"]
])

function addBook() {
  var newArr = []

  if (!book.value['name']) return
  newArr.push(book.value['name'])
  !book.value["price"] ? newArr.push(1) : newArr.push(book.value["price"])
  !book.value["num"] ? newArr.push(1) : newArr.push(book.value["num"])
  bookArr.value.push(newArr)

}

const moduleShow = ref([
  true,
  true,
  true
])
</script>
<style scoped>


.轮播图 {
  height: 600px;
  border-radius: 6px;
  position: relative;
  overflow: hidden;
}

.轮播图-ul {
  height: 100%;
  position: relative;
}

.轮播图-time {
  position: absolute;
  top: 0;
  left: 0;
  padding: 5px 8px;
  font-size: large;
  color: white;
  background: rgba(0, 0, 0, 0.3);
  border-bottom-right-radius: 6px;
}

.轮播图-chose {
  position: absolute;
  left: 0;
  bottom: 10px;
  height: 20%;
  width: 100%;
  display: flex;
  justify-content: center;
}

.轮播图-chose>div {
  height: 100%;
  border-radius: 6px;
  margin: 0 10px;
  border: 2px solid rgb(168, 168, 168);
  overflow: hidden;
  transition: transform .2s;
}

.轮播图-chose>.active {
  transform: scale(1.1);
  border-color: peru;
}

.input-group {
  margin-left: 10px;
  display: flex;
  align-items: center;
}

.input-group>span {
  margin-right: 6px;
}

.pre {
  width: fit-content;
  margin: auto;
  margin-top: 20px;
  border-radius: 6px;
  padding: 10px;
  padding-top: 2px;
  border: 1px solid;
}

.pre>h4 {
  padding-bottom: 5px;
}

.pre-body {
  border-radius: 6px;
}

.book-li:first-child {
  background: rgba(0, 255, 153, 0.4) !important;
  border-top-left-radius: 6px;
  border-top-right-radius: 6px;
}

.book-li:last-child {
  border-bottom: 0;
  border-bottom-left-radius: 6px;
  border-bottom-right-radius: 6px;
}

.book-li {
  width: fit-content;
  display: flex;
  align-items: center;
  background-color: rgba(232, 232, 232, 0.4);
  border-bottom: 1px solid black;
}

.book-li:hover {
  box-shadow: 0px 0px 10px rgb(0, 0, 0);
}

.book-li:nth-child(2n) {
  background-color: rgba(169, 169, 169, 0.4);
}

.book-li>div {
  padding: 5px 10px;
  width: 250px;
  height: 100%;
  text-align: center;
}

.book-name {
  color: rgba(255, 0, 0);
}

.book-price {
  color: rgb(34, 94, 36);
}

.book-num {
  color: rgba(0, 42, 255);
}

.scroll {
  height: 300px;
  width: fit-content;
  overflow: auto;
  background-color: #ddd;
  margin: auto;
  margin-top: 10px;
  padding: 10px 30px;
  border-radius: 6px;
}

.book-ul {
  border: 1px solid;
  width: fit-content;
  margin: auto;
  border-radius: 6px;
}

.book-ul>div {
  margin: 0;
  border-radius: 0;
}

.book-ul>div:nth-child(2n) {
  color: red;
}

.card {
  height: 160px;
  display: flex;
  align-items: center;
  border: 1px solid;
  border-radius: 8px;
  padding: 0 10px;
}

.card:nth-child(2n){
  margin-top: 10px;
}

.card-img {
  min-width: fit-content;
  height: 100%;
  overflow: hidden;
}

.card-txt h4 {
  font-size: 20px;
  font-weight: 600;
  color: #41B883;
}
</style>