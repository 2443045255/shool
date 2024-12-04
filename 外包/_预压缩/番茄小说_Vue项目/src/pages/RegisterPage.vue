<template>
  <main>
    <div class="login-title">
      <h2>注册账号</h2>
      <p class="a" @click="toPage('LoginPage')">已有账号。去登陆</p>
    </div>
    <div class="loginDiv username">
      <input class="loginInput" type="text" placeholder="" v-model="reg_username" @change="usernameChange()"> 
      <span>账号</span>
    </div>
    <TransitionGroup name="login" tag="div" class="traGroup">
      <div :key="1" v-if="UsernamePass" class="traItem">
        <div class="loginDiv username">
          <input class="loginInput" type="text" placeholder="" v-model="reg_password">
          <span>密码</span>
        </div>
      </div>

      <div :key="2" class="traItem">
        <div class="next a1" @click="reg()">
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

const reg_username = ref('')
const reg_password = ref('')
const UsernamePass = ref(false)

function usernameChange(){
  UsernamePass.value = false
}

const UserArray = inject('UserArray')

function reg() {
  if (!reg_username.value) {
    alert('请输入账号')
    return
  }
  var newUser = []
  if (!UsernamePass.value){
    UsernamePass.value = true
    return
  }
  if(!reg_password.value){
    alert('请输入密码')
    return
  }else{
    newUser.push(reg_username.value)
    newUser.push(reg_password.value)
    UserArray.value.push(newUser)
    alert('注册成功')
    UsernamePass.value = false
    reg_username.value = ''
    reg_password.value = ''
  }
}
</script>
<style>
.traGroup {
  position: relative;
}

.login-move,
.login-enter-active,
.login-leave-active {
  transition: all 0.2s ease;
}

.login-enter-from,
.login-leave-to {
  opacity: 0;
  transform: translateX(30px);
}

.login-leave-active {
  position: absolute;
  margin: 0;
}
</style>
<style>
.traItem {
  width: 100%;
  overflow: hidden;
}

.login-title {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.loginDiv {
  border-bottom: 1px solid;
  width: fit-content;
  position: relative;
  margin: auto;
  margin-top: 30px;
}

.loginInput {
  padding: 5px;
  outline: none;
  width: 300px;
  font-size: 18px;
}

.loginDiv>span {
  position: absolute;
  left: 6px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 18px;
  color: #8b8b8b;
  user-select: none;
  transition: .2s;
}

.loginInput:not(:placeholder-shown)~span,
.loginInput:focus~span {
  font-size: 14px;
  transform: translateY(0%);
  top: -50%;
  left: 0px;
}

.next {
  margin: auto;
  margin-top: 20px;
  width: 300px;
  text-align: center;
  background: #ff6052;
  color: #fff;
  padding: 10px 0;
  border-radius: 4px;
  position: relative;
}
</style>