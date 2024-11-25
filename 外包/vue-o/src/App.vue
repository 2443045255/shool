<script setup>
import { ref } from 'vue'

import FirstPage from "./pages/FirstPage.vue"
import DetailsPage from "./pages/DetailsPage.vue"
import LoginPage from "./pages/LoginPage.vue"

const activeTab = ref('FirstPage')

const tabs = {
  FirstPage,
  DetailsPage,
  LoginPage
}
const tabsToCN = {
  FirstPage: "首页",
  DetailsPage: "详情",
  LoginPage: "登录"
}


function gotop() {
  document.documentElement.scrollTop = 0
}
const docScrollTop = ref(0)
document.onscroll = function () {
  docScrollTop.value = document.documentElement.scrollTop
}
</script>

<template>
  <header>
    <div class="logo"><span>LOGO</span></div>
    <div class="wrapper">
      <nav>
        <span v-for="(_, tab) in tabs" :key="tab" :class="['tab-span a', { active: activeTab == tab }]"
          @click="activeTab = tab">{{ tabsToCN[tab] }}</span>
      </nav>
    </div>
  </header>
  <keep-alive>
    <component :is="tabs[activeTab]" class="tab"></component>
  </keep-alive>


  <div class="more-btn-group">
    <div class="a" id="gotop" @click="gotop()" v-show="docScrollTop > 100">回到顶部</div>
  </div>
</template>

<style scoped>
header {
  display: flex;
  align-items: center;
  justify-content: center;
  background: #ccc;
  padding: 10px;
}

.logo {
  font-size: larger;
  margin-right: 15px;
  padding-right: 15px;
  border-right: 1px solid;
}

nav>.active {
  border-color: red;
}

.tab-span {
  padding: 4px 15px;
  border: 1px solid transparent;
  border-radius: 4px;
  transition: border-color .2s;
}

.tab-span:hover {
  border-color: black;
}

.tab-span:active {
  background: rgba(0, 255, 153, 0.3);
}

.more-btn-group {
  position: fixed;
  bottom: 2cm;
  right: 20px;
  padding: 10px;
}

.more-btn-group>div {
  background: #ccc;
  padding: 2px 10px;
  border-radius: 6px;
}

.more-btn-group>div:hover {
  background: #bbb;
}

.more-btn-group>div:active {
  background: #aaa;
}
</style>
