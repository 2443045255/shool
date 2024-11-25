<template>
  <header>
    <div class="logo">
      <div class="img">
        <img src="/public/images/logo.png" alt="">
      </div>
    </div>
    <div class="wrapper">
      <nav>
        <a href="#" class="active" @click="toNav('HomePage',$event)">首页</a>
        <a href="#" @click="toNav('InfoPage',$event)">详情</a>
        <a href="#" @click="toNav('LoginPage',$event)">登录</a>
      </nav>
    </div>
  </header>
  <component :is="navUrl"></component>
</template>
<script setup>
import HomePage from "./pages/HomePage.vue";
import InfoPage from "./pages/InfoPage.vue";
import LoginPage from "./pages/LoginPage.vue";
import { ref,shallowRef } from "vue";


const navUrlAll = {
  HomePage,
  InfoPage,
  LoginPage
}
const navUrl = shallowRef(navUrlAll["HomePage"])
function toNav(value,event) {
  navUrl.value = navUrlAll[`${value}`]
  document.querySelector('nav a.active').className = ''
  event.srcElement.className = 'active'
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
  background: linear-gradient(90deg,black,black) center bottom no-repeat;
  background-size: 0% 2px;
  transition: background-size .2s;
}

nav a.active {
  background: linear-gradient(90deg,black,black) center bottom no-repeat;
  background-size: 100% 2px;
}
</style>
