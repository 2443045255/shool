<template>
  <header>
    <div class="wrapper">
      <div class="title a" @click="toPage('HomePage')">回到主页</div>
      <div class="right">
        <p class="user">
          <span>当前用户：</span>
          <span class="a" v-show="ActiveUser[0]" @click="UserSettingActive = true">{{ ActiveUser[0] }}</span>
          <span class="a logout" v-show="ActiveUser[0]" @click="ActiveUser = []">退出账户</span>
          <span class="a" @click="toPage('LoginPage')" v-show="!ActiveUser[0]">请登录</span>
        </p>
      </div>
    </div>
  </header>
  <Transition name="page" mode="out-in">
    <KeepAlive>
      <component :is="pages[ActivePage]" :msg="PageData"></component>
    </KeepAlive>
  </Transition>

  <UserSetting />
  <GoTop />
</template>
<script setup>
import { inject, ref } from 'vue';
import UserSetting from './components/UserSetting.vue';
import GoTop from './components/GoTop.vue';

import HomePage from './pages/HomePage.vue';
import InfoPage from './pages/InfoPage.vue';
import LoginPage from './pages/LoginPage.vue';
import RegisterPage from './pages/RegisterPage.vue';
import SearchPage from './pages/SearchPage.vue';



const UserSettingActive = inject('UserSettingActive')

const ActiveUser = inject('ActiveUser')


const msg = ref([])
const ActivePage = inject('ActivePage')
const PageData = inject('PageData')
function toPage(value) {
  ActivePage.value = value
}
const pages = {
  HomePage,
  InfoPage,
  LoginPage,
  RegisterPage,
  SearchPage
}

function getdata(data) {
  if (data[0]) {
    toPage(data[0])
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

.logout {
  color: black !important;
  margin: 0 5px;
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
