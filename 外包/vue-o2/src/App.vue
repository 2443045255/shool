<template>
  <header>
    <div class="logo">
      <div class="img">
        <img src="/images/logo.png" alt="">
      </div>
    </div>
    <div class="wrapper">
      <nav>
        <a href="#" class="active" @click="toNav('HomePage', $event)">首页</a>
        <a href="#" @click="toNav('InfoPage', $event)">详情</a>
        <a href="#" @click="toNav('LoginPage', $event)">登录</a>
      </nav>
    </div>
  </header>
  <div class="goTop" @click="goTop()" v-show="bodyScrollTop >= 200"><img src="/images/goTop.png" alt=""></div>
  <component :is="navUrl"></component>
</template>
<script setup>
import HomePage from "./pages/HomePage.vue";
import InfoPage from "./pages/InfoPage.vue";
import LoginPage from "./pages/LoginPage.vue";
import { ref, shallowRef } from "vue";


const navUrlAll = {
  HomePage,
  InfoPage,
  LoginPage
}
const navUrl = shallowRef(navUrlAll["HomePage"])
function toNav(value, event) {
  navUrl.value = navUrlAll[`${value}`]
  document.querySelector('nav a.active').className = ''
  event.srcElement.className = 'active'
}
const bodyScrollTop = ref(0)
window.onscroll = function () {
  bodyScrollTop.value = document.documentElement.scrollTop
}
function goTop() {
  document.documentElement.scrollTop = 0
}
</script>
<style scoped>
header {
  height: 60px;
  background-color: white;
  display: flex;
  color: #094C9E;
}

header>div {
  height: 100%;

}

.logo {
  border-right: 1px solid;
  padding: 0 20px;
  display: flex;
  align-items: center;
}

nav {
  padding: 0 10px;
  height: 100%;
  display: flex;
}

nav a {
  color: #094C9E;
  height: 100%;
  display: flex;
  align-items: center;
  padding: 20px;
  background: linear-gradient(90deg, black, black) center bottom no-repeat;
  background-size: 0% 2px;
  transition: background-size .2s;
}

nav a.active {
  background: linear-gradient(90deg, black, black) center bottom no-repeat;
  background-size: 100% 2px;
}

.goTop {
  position: fixed;
  bottom: 2cm;
  right: 1cm;
  border-radius: 50%;
  background: #fff;
  height: 60px;
  width: 60px;
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: .7;
  transition: .1s;
}

.goTop:hover {
  opacity: 1;
}
</style>
