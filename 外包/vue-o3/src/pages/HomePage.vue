<template>
  <main>
    <SearchDiv />
    <div class="first-mod">
      <div class="FM-list">
        <div class="FM-item flex-c-c a" v-for="value in FM_itemArr" :key="value">
          {{ value }}</div>
      </div>
      <div class="FM-body">
        <div class="FM-time">{{ FMtime }}</div>
        <div class="FM-ul">
          <div id="FMimg_1" class="FM-li img">
            <img :src="FMimgArr[FMimgold]" alt="">
          </div>
        </div>
        <div class="FM-imgIndex">
          <span v-for="(value, index) in FMimgArr" :key="value" :class="{ 'active': index == FMimgold }"
            @click="轮播(index)"></span>
        </div>
      </div>
    </div>

    <SecondMod />
  </main>
</template>
<script setup>
import SearchDiv from '@/components/SearchDiv.vue';
import SecondMod from '@/components/SecondMod.vue';

import { inject, onActivated, onMounted, onUnmounted, ref } from 'vue';

const scroll_top = ref(0)



onMounted(() => {
  自动轮播(true)
})

onActivated(() => {
  if (scroll_top.value != 0) {
    document.documentElement.scrollTop = scroll_top.value
  }
  //记录跳转前的位置
  document.onscroll = function () {
    if (document.documentElement.scrollTop != 0) {
      scroll_top.value = document.documentElement.scrollTop
    }
  }
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
const FMtime = ref(3)
var setTimeout1
function 自动轮播(value) {
  if (value) {
    setTimeout1 = setInterval(() => {
      if (FMtime.value == 0) {
        FMimgActive.value + 1 > 4 ? FMimgActive.value = 0 : FMimgActive.value++
        轮播(FMimgActive.value)
        FMtime.value = 3
      } else {
        FMtime.value--
      }
    }, 1000);
  } else {
    clearInterval(setTimeout1)
  }
}

function 轮播(value) {
  FMimgActive.value = value
  var FM_ul = document.querySelector('.FM-ul')
  if (!FM_ul) return

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
.first-mod {
  display: flex;
}

.FM-list {
  width: 150px;
  margin-right: 10px;
  text-align: center;
  display: grid;
  grid-template-rows: repeat(12, 1fr);
}

.FM-item {
  border-radius: 4px;
  transition: .1s;
}

.FM-item:hover {
  background: rgb(255, 72, 72);
  color: #fff;
}

.FM-body {
  flex: 1;
  overflow: hidden;
  border-radius: 6px;
  position: relative;
}

.FM-time {
  position: absolute;
  top: 0;
  left: 0;
  padding: 5px 15px;
  z-index: 2;
  background: rgba(255, 255, 255, 0.3);
}

.FM-ul {
  width: 200%;
  display: flex;
}

.FM-imgIndex {
  position: absolute;
  bottom: 10px;
  left: 0;
  width: 100%;
  display: flex;
  justify-content: center;
}

.FM-imgIndex>span {
  display: block;
  --widhei: 15px;
  height: var(--widhei);
  width: var(--widhei);
  background: #fff;
  border-radius: 50%;
  margin: 0 5px;
}

.FM-imgIndex>span.active {
  background: #aaa;
}
</style>
