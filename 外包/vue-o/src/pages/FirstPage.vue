<template>
  <main>
    <h2>首页</h2>
    <section>
      <div class="module">
        <h3 class="module-title">轮播图</h3>
        <div class="module-body">
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
        <h3 class="module-title">表单验证</h3>
        <div class="module-body">
          <div class="flex" style="align-items: center;justify-content: center;">
            <div class="input-group">
              <span>书名:</span>
              <input type="text" class="input-large" v-model="bookName">
            </div>
            <div class="input-group">
              <span>价格:</span>
              <input type="number" class="input-large" v-model="bookPrice">
              <span>元</span>
            </div>
            <div class="input-group">
              <span>数量:</span>
              <input type="number" class="input-large" v-model="bookNum">
            </div>

            <button class="large-btn" style="margin-left: 20px;" @click="addBook()">添加</button>
          </div>
          <div class="book-li">
            <div class="book-title">预览：</div>
            <div class="book-name">{{ bookName }}</div>
            <div class="book-price">{{ bookPrice }}</div>
            <div class="book-num">{{ bookNum }}</div>
          </div>
          <div class="book-ul">
            <div class="book-li" v-for="key in bookArr" :key="key">
              <div class="book-name">{{ key[0] }}</div>
              <div class="book-price">{{ key[1] }}</div>
              <div class="book-num">{{ key[2] }}</div>
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


const bookName = ref('')
const bookPrice = ref()
const bookNum = ref()

const bookArr = ref([
  ["测试名", 10, 100]
])

function addBook(){
  var newArr = []

  if(bookName.value){
    newArr.push(bookName.value)
    !bookPrice.value ? newArr.push(1) : newArr.push(bookPrice.value)
    !bookNum.value ? newArr.push(1) : newArr.push(bookNum.value)
  }
  bookArr.value.push(newArr)
}
</script>
<style scoped>
.module {
  user-select: none;
  border-top: 1px solid;
  margin-top: 20px;
}

.module:first-child {
  border-top: 0;
  margin-top: 0;
}

.module-title::after {
  content: "--";
}

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
  border: 1px solid rgb(168, 168, 168);
  overflow: hidden;
  transition: transform .2s;
}

.轮播图-chose>.active {
  transform: scale(1.1);
}

.input-group {
  margin-left: 10px;
  display: flex;
  align-items: center;
}

.input-group>span {
  margin-right: 6px;
}

.book-li {
  height: 30px;
  width: fit-content;
  margin: auto;
  margin-top: 20px;
  display: flex;
  align-items: center;
  border-radius: 6px;
  overflow: hidden;
}

.book-li>div {
  padding: 0 10px;
  width: 230px;
  height: 100%;
  text-align: center;
}

.book-title{
  background-color: rgba(0, 255, 255, 0.2);
}

.book-name {
  background: rgba(255, 0, 0, 0.2);
}

.book-price {
  background: rgba(0, 255, 8, 0.2);
}

.book-num {
  background: rgba(0, 42, 255, 0.2);
}

.book-ul {
  border: 1px solid;
  width: fit-content;
  margin: auto;
  margin-top: 30px;
  border-radius: 6px;
  overflow: hidden;
}
.book-ul>div{
  margin: 0;
  border-radius: 0;
}
</style>