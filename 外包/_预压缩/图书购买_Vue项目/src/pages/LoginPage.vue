<template>
  <main>
    <div class="login-title">
      <h2>登录</h2>
      <p class="a" @click="toPage('RegisterPage')">无账号？去注册</p>
    </div>
    <div class="loginDiv username">
      <input class="loginInput" type="text" placeholder="" v-model="username" @change="usernameChange()">
      <span>账号</span>
    </div>
    <TransitionGroup name="login" tag="div" class="traGroup">
      <div :key="1" v-if="UsernamePass" class="traItem">
        <div class="loginDiv username">
          <input class="loginInput" type="text" placeholder="" v-model="password">
          <span>密码</span>
        </div>
      </div>

      <div :key="2" class="traItem">
        <div class="next a1" @click="login()">
          <span>继续</span>
        </div>
      </div>
    </TransitionGroup>
  </main>
</template>
<script setup>
import { inject, ref } from 'vue';

const ActivePage = inject('ActivePage')
function toPage(value) {
  ActivePage.value = value
}

const username = ref('')
const password = ref('')
const UsernamePass = ref(false)

function usernameChange() {
  UsernamePass.value = false
}

const UserArray = inject('UserArray')
const ActiveUser = inject('ActiveUser')

var UserIndex = 0
function login() {
  if (UserArray.value.length == 0) {
    alert('无账号，请注册')
    return
  }
  if (!username.value) {
    alert('请输入账号')
    return
  }
  if (!UsernamePass.value) {
    for (let i = 0; i <= UserArray.value.length; i++) {
      if (username.value == UserArray.value[i][0]) {
        UsernamePass.value = true
        UserIndex = i
        break
      }
    }
    if (!UsernamePass.value) {
      alert('账号不存在')
      return
    } else {
      alert('账号存在')
      return
    }
  }
  if (!password.value) {
    alert('请输入密码')
    return
  } else {
    if (UserArray.value[UserIndex][1] == password.value) {
      alert('登录成功')
      UsernamePass.value = false
      username.value = ''
      password.value = ''
      ActiveUser.value = UserArray.value[UserIndex]
      toPage('HomePage')
    } else {
      alert('登录失败')
    }
  }

}
</script>
<style></style>