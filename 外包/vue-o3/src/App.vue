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
  <Transition>
    <component :is="pages[page]" @page="AppToPage"></component>
  </Transition>


</template>
<script setup>
import HomePage from './pages/HomePage.vue';
import InfoPage from './pages/InfoPage.vue';
import { ref } from 'vue';


const page = ref('HomePage')
const pages = {
  HomePage,
  InfoPage
}
function AppToPage(value) {
  page.value = value
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

.v-enter-active,
.v-leave-active {
  transition: .2s;
}

.v-enter-from,
.v-leave-to {
  transform: translateY(1%);
  opacity: 0;
}
</style>
