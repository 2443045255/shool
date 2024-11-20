<template>
  <main>
    <h2>首页</h2>
    <section>
      <div class="module">
        <h3>轮播图</h3>
        <div class="module-body">
          <div class="轮播图" @mouseover="自动轮播图(false)" @mouseout="自动轮播图(true)">
            <div class="轮播图-ul">
              <img :src="imgUrls[old轮播图active]">
            </div>
            <div class="轮播图-time">
              <span>{{ 轮播图time }}</span>
            </div>
            <div class="轮播图-chose">
              <div v-for="(key, index) in imgUrls" :key="key" :class="{ active: 轮播图active == index }"
                @click="轮播图切换(index)"><img :src="key" class="轮播图-img"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>
<script setup>
import { onMounted, ref } from 'vue';

var first = false

window.onload = function () {
  first = true
  同步高宽(document.querySelectorAll(".轮播图-img"))
}

const 轮播图time = ref(3)
var 轮播图setInterval = null
onMounted(() => {
  同步高宽(document.querySelectorAll(".轮播图-img"))
  自动轮播图(true)

})
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
const old轮播图active = ref(0)
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
const 轮播图active = ref(0)
const imgUrls = [
  "/public/images/01.jpg",
  "/public/images/02.jpg",
  "/public/images/03.jpg",
  "/public/images/04.jpg",
]
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

@keyframes 向右进入 {
  from {
    left: 100%
  }

  to {
    left: 0%
  }
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
</style>