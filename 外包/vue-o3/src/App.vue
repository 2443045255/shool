<template>
  <header>
    <div class="wrapper">
      <div class="title a">图书购买</div>
      <div class="right">
        <p class="user">
          <span>当前用户：</span>
          <span class="a" @click="sendVal('InfoPage')">请登录</span>
        </p>
      </div>
    </div>
  </header>
  <Transition name="page" mode="out-in">
    <component :is="pages[page]" @data="getdata" :msg="msg"></component>
  </Transition>


</template>
<script setup>
import HomePage from './pages/HomePage.vue';
import InfoPage from './pages/InfoPage.vue';
import { ref } from 'vue';

const msg = ref([])
const page = ref('HomePage')
const pages = {
  HomePage,
  InfoPage
}

function getdata(data) {
  if (data[0]) {
    page.value = data[0]
  }
  if (data[1]) {
    msg.value = data[1]
  }
}


</script>
<style scoped>
header {
  border-bottom: 1px solid;
  font-size: 14px;
  padding: 5px 0;
  color: #5a5a5a;
}

header>.wrapper {
  margin: auto;
  width: 1100px;
  display: flex;
  justify-content: space-between;
}

header .user span:not(:first-child) {
  color: rgb(255, 96, 96);
}

.page-enter-active,
.page-leave-active {
  transition: .2s;
}

.page-enter-to,
.page-leave-from {
  opacity: 1;
}

.page-enter-from,
.page-leave-to {
  transform: translateY(10px);
  opacity: 0;
}
</style>
