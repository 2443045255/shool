<template>
  <header>
    <div class="wrapper">
      <div class="title">图书购买</div>
      <div class="right">
        <p class="user">
          <span>当前用户：</span>
          <span class="a">请登录</span>
        </p>
      </div>
    </div>
  </header>

  <main>
    <div class="first-mod">
      <div class="FM-list">
        <div class="FM-item flex-c-c a" v-for="value in FM_itemArr" :key="value">{{ value }}</div>
      </div>
      <div class="FM-body">
        <div class="FM-ul">
          <div id="FMimg_1" class="FM-li img">
            <img :src="FMimgArr[FMimgold]" alt="">
          </div>
        </div>
      </div>
    </div>
  </main>
</template>
<script setup>
import { onMounted, onUnmounted, ref } from 'vue';

onMounted(() => {
  自动轮播(true)
})

onUnmounted(() => {
  自动轮播(false)
})

const FM_itemArr = ref([
  "文娱商城",
  "人文社科",
  "知识服务",
  "经管投资",
  "成功励志",
  "平价书店",
  "学习用书",
  "进口原版",
  "热门考试",
  "文学小说",
  "生活育儿",
  "教育培训"
])

const FMimgArr = [
  '/public/images/FMimg1.jpg',
  '/public/images/FMimg2.jpg',
  '/public/images/FMimg3.jpg',
  '/public/images/FMimg4.jpg',
  '/public/images/FMimg5.jpg',
]

const FMimgActive = ref(0)
const FMimgold = ref(0)
const FMtime = ref(2)
function 自动轮播(value) {
  var setTimeout1
  if (value) {
    setTimeout1 = setInterval(() => {
      if (FMtime.value == 0) {
        FMimgActive.value + 1 > 4 ? FMimgActive.value = 0 : FMimgActive.value++
        轮播(FMimgActive.value)
        FMtime.value = 2
      } else {
        FMtime.value--
      }
    }, 1000);
  } else {
    clearInterval(setTimeout1)
  }
}

function 轮播(value) {
  var FM_ul = document.querySelector('.FM-ul')
  var new_FM_li = document.createElement('div')
  new_FM_li.className = 'FM-li img newFMimg'
  var new_img = document.createElement('img')
  new_img.src = FMimgArr[value]
  new_FM_li.append(new_img)
  FM_ul.append(new_FM_li)
  var FMimg_1 = document.getElementById('FMimg_1')
  FMimg_1.classList.add('oldFMimg')
  FMimg_1.onanimationend = function () {
    FMimgold.value = value
    FMimg_1.classList.remove('oldFMimg')
  }
  new_FM_li.onanimationend = function () {
    new_FM_li.remove()
  }
}
</script>
<style>
.FM-li {
  width: 50%;
}

.oldFMimg {
  animation: 向左划出 .4s forwards;
}

@keyframes 向左划出 {
  from {
    transform: translateX(0%);
  }

  to {
    transform: translateX(-100%);
  }
}

.newFMimg {
  animation: 向左划出 .4s forwards;
}
</style>
<style scoped>
header {
  border-bottom: 1px solid;
  font-size: 14px;
  padding: 5px 0;
  color: #5a5a5a;
}

header>.wrapper {
  margin: auto;
  width: 1200px;
  display: flex;
  justify-content: space-between;
}

header .user span:not(:first-child) {
  color: rgb(255, 96, 96);
}

main {
  width: 1200px;
  margin: auto;
  margin-top: 10px;
  background: #fff;
  border-radius: 6px;
}

.first-mod {
  padding: 10px;
  display: flex;
}

.FM-list {
  width: 120px;
  margin-right: 10px;
  text-align: center;
  display: grid;
  grid-template-rows: repeat(12, 1fr);
}

.FM-item:hover {
  background: rgb(255, 72, 72);
  color: #fff;
}

.FM-body {
  flex: 1;
  overflow: hidden;
  border-radius: 6px;
}

.FM-ul {
  width: 200%;
  display: flex;
}
</style>
