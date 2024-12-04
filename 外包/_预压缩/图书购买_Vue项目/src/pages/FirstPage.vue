<template>
  <main>
    <section>
      <div class="module">
        <div class="module-title">
          <span>近期活动</span>
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
          <span>搜索小说</span>
          <div class="module-btn-group">
            <button class="module-btn module-hide-btn" v-show="moduleShow[1]">收起</button>
            <button class="module-btn module-show-btn" v-show="!moduleShow[1]">展开</button>
          </div>
        </div>
        <div class="module-body" :class="{ 'module-hide': !moduleShow[1] }">
          <div class="flex-c-c">
            <div class="search">
              <input type="text" v-model="searchTxt">
              <div class="search-btn a" @click="search()">搜索</div>
            </div>
          </div>
          <div class="bookUl">
            <div class="noItem" v-show="searchArr == 0">
              <span>无内容</span>
            </div>
            <div class="bookli" v-for="value in searchArr" :key="value">
              <div class="bookli-img">
                <img :src="bookUrl + value[0]" alt="">
              </div>
              <div class="bookli-txt">
                <div class="bookli-title">
                  <span>{{ value[1] }}</span>
                </div>
                <div class="bookli-writer">
                  <span>作者:</span>
                  <span>{{ value[2] }}</span>
                </div>
                <div class="bookli-type">
                  <span>状态:</span>
                  <span>{{ value[3] }}</span>
                </div>
                <div class="bookli-time">
                  <span>{{ value[4] }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="module">
        <div class="module-title">
          <span>推荐小说</span>
          <div class="module-btn-group">
            <button class="module-btn module-hide-btn" v-show="moduleShow[2]">收起</button>
            <button class="module-btn module-show-btn" v-show="!moduleShow[2]">展开</button>
          </div>
        </div>
        <div class="module-body" :class="{ 'module-hide': !moduleShow[2] }">
          <div class="bookUl bookTo" style="height: auto;">
            <div class="bookli noflex" v-for="value in bookArray" :key="value">
              <div class="bookli-img">
                <img :src="bookUrl + value[0]" alt="">
              </div>
              <div class="bookli-txt">
                <div class="bookli-title">
                  <span>{{ value[1] }}</span>
                </div>
                <div class="bookli-writer">
                  <span>作者:</span>
                  <span>{{ value[2] }}</span>
                </div>
                <div class="bookli-type">
                  <span>状态:</span>
                  <span>{{ value[3] }}</span>
                </div>
                <div class="bookli-time">
                  <span>{{ value[4] }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
  </main>
</template>
<script setup>
import { onMounted, onUnmounted, ref } from 'vue';


const 轮播图time = ref(3)
var 轮播图setInterval = null
window.onload = function () {
  document.querySelectorAll(".module-body").forEach((element, index) => {
    element.style.height = element.scrollHeight + "px"
  })
}
onMounted(() => {
  自动轮播图(true)



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
  "/images/01.jpg",
  "/images/02.jpg",
  "/images/03.jpg",
  "/images/04.jpg",
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

const bookUrl = '/images/books/'
const bookArray = ref([
  ['1.jpg', '十日终焉', '杀虫队队员', '已完结', '2024-10-31'],
  ['2.jpg', '我在精神病院斩神', '三九音域', '已完结', '2024-10-31'],
  ['3.jpg', '我不是戏神', '三九音域', '已完结', '2024-10-31'],
  ['4.jpg', '天渊', '沐潇三生', '已完结', '2024-10-31'],
  ['5.jpg', '大一实习,你跑去749收容怪物', '我爱罗的沙', '已完结', '2024-10-31'],
  ['6.jpg', '颠,都颠,颠点好', '小盐子', '已完结', '2024-10-31'],

  ['1.jpg', '十日终焉', '杀虫队队员', '已完结', '2024-10-31'],
  ['2.jpg', '我在精神病院斩神', '三九音域', '已完结', '2024-10-31'],
  ['3.jpg', '我不是戏神', '三九音域', '已完结', '2024-10-31'],
  ['4.jpg', '天渊', '沐潇三生', '已完结', '2024-10-31'],
  ['5.jpg', '大一实习,你跑去749收容怪物', '我爱罗的沙', '已完结', '2024-10-31'],
  ['6.jpg', '颠,都颠,颠点好', '小盐子', '已完结', '2024-10-31'],
])

const searchArr = ref([])
const searchTxt = ref('')
function search() {
  if (!searchTxt.value) {
    searchArr.value = []
    return
  }
  searchArr.value = []
  for (let i = 0; i <= bookArray.value.length - 1; i++) {
    if (bookArray.value[i][1].indexOf(searchTxt.value) != -1) {
      var isSome = false
      for (let j = 0; j <= searchArr.value.length - 1; j++) {
        if (searchArr.value[j][1] == bookArray.value[i][1]) {
          isSome = true
          break
        }
      }
      if (!isSome) {
        searchArr.value.push(bookArray.value[i])
      }
    }
  }
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
  width: 230px;
  border-radius: 6px;
  margin: 0 10px;
  border: 2px solid rgb(168, 168, 168);
  overflow: hidden;
  transition: transform .2s;
  display: flex;
  align-items: center;
  justify-content: center;
}

.轮播图-chose>.active {
  transform: scale(1.1);
  border-color: peru;
}

.search {
  display: flex;
  align-items: center;
  width: 600px;
  border-radius: 30px;
  border: 1px solid;
  padding: 2px;
  padding-left: 5px;
  margin-bottom: 20px;
}

.search>input {
  flex: 1;
  width: auto;
  outline: none;
  border: none;
  font-size: 16px;
}

.search-btn {
  background: #ddd;
  border-radius: 30px;
  padding: 3px 10px;
}

.bookUl {
  display: grid;
  gap: 25px 15px;
  grid-template-columns: repeat(4, 1fr);
  max-width: 1120px;
  height: 340px;
  overflow-y: auto;
  margin: auto;
  padding: 10px;
  position: relative;
}

.noItem {
  font-size: 25px;
  text-align: center;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
}


.bookli {
  display: flex;
  border-radius: 6px;
  padding: 5px;
  transition: .2s;
  height: fit-content;
}

.bookli:hover {
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  transform: scale(1.05);
}

.bookli-img {
  border-radius: 4px;
  overflow: hidden;
  margin-right: 10px;
  width: 40%;
}

.bookli-txt {
  width: calc(60% - 10px);
  font-size: 14px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.bookli-title {
  font-size: 16px;
}

.bookli-writer,
.bookli-type,
.bookli-time {
  color: #717171;
}

.bookUl.bookTo {
  grid-template-columns: repeat(6, 1fr);
  overflow: visible;
}

.bookli.noflex {
  display: block;
}

.bookli.noflex .bookli-img,
.bookli.noflex .bookli-txt {
  width: auto;
  margin: 0;
}

.bookli.noflex .bookli-txt {
  margin-top: 5px;
}
</style>