<template>
    <div class="login">
        <div class="login-body">
            <div class="login-1">
                <div class="login-1-title">login</div>
                <div class="login-1-input-group">
                    <input type="text" class="username" autocomplete="off" v-model="username">
                    <span class="login-1-input-group-pl">账号</span>
                </div>
                <div class="login-1-input-group">
                    <input type="password" class="password" autocomplete="off" v-model="password">
                    <span class="login-1-input-group-pl">密码</span>
                </div>
                <button class="login-1-btn1" @click="login()">登录</button>
                <div class="goOther">
                    <span @click="goReg()">无账号？去注册。</span>
                </div>
            </div>
            <div class="login-2">
                <div class="login-1-title">register</div>
                <div class="login-1-input-group">
                    <input type="text" class="username" autocomplete="off" v-model="username">
                    <span class="login-1-input-group-pl">账号</span>
                </div>
                <div class="login-1-input-group">
                    <input type="password" class="password" autocomplete="off" v-model="password">
                    <span class="login-1-input-group-pl">密码</span>
                </div>
                <button class="login-1-btn1 botton-green" @click="reg()">注册</button>
                <div class="goOther">
                    <span @click="gologin()">已有账号。去登录</span>
                </div>
            </div>
            <div class="img" :class="[{ 'img-right': img_right }, { 'img-left': img_left }]">
                <img src="/images/login.jpg" alt="">
            </div>
        </div>
        <div class="showUser" :class="[{ 'open': showUser }, { 'close': !showUser }]">
            <div class="showUser-body">
                <div class="showUser-setBtn" @click="showUser = !showUser">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                        <path fill="currentColor"
                            d="M831.872 340.864 512 652.672 192.128 340.864a30.592 30.592 0 0 0-42.752 0 29.12 29.12 0 0 0 0 41.6L489.664 714.24a32 32 0 0 0 44.672 0l340.288-331.712a29.12 29.12 0 0 0 0-41.728 30.592 30.592 0 0 0-42.752 0z">
                        </path>
                    </svg>
                </div>
                <div class="showUser-ul">
                    <div class="showUser-ul-title">后台用户</div>
                    <div class="showUser-item" v-for="(user, index) in saveUser" :key="user">
                        <p class="showUser-username">
                            <span>账号:</span>
                            <span>{{ user['username'] }}</span>
                        </p>
                        <p class="showUser-password">
                            <span>密码:</span>
                            <span>{{ user['password'] }}</span>
                        </p>
                        <div class="delete_user" @click="delete_user(index)">删除</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>
<script setup>
import { onMounted, ref } from 'vue';


const img_right = ref(false)
const img_left = ref(true)
function goReg() {
    img_right.value = false
    img_left.value = true
}
function gologin() {
    img_right.value = true
    img_left.value = false
}

const saveUser = ref([])
const username = ref('')
const password = ref('')
function 检查() {
    if (!username.value) {
        alert("无用户名")
        return false
    }
    if (!password.value) {
        alert("无用户名")
        return false
    }
}
function reg() {
    if (检查() == false) { return }
    for (let i = 0; i <= saveUser.value.length - 1; i++) {
        if (username.value == saveUser.value[i]['username']) {
            alert('用户名已存在')
            return
        }
    }
    var newUser = {
        'username': username.value,
        'password': password.value
    }
    saveUser.value.push(newUser)
    alert('注册成功')
    保存到内存(saveUser.value)

    username.value = ''
    password.value = ''
}
var findUsername = false
var findPassword = false
function login() {
    if (检查() == false) { return }
    if (!saveUser.value.length) {
        alert('后台无用户,请先注册')
        return
    }
    for (let i = 0; i <= saveUser.value.length - 1; i++) {
        if (username.value == saveUser.value[i]['username']) {
            findUsername = true
        }
        if (findUsername) {
            if (password.value == saveUser.value[i]['password']) {
                findPassword = true
            }
        }
    }
    if (!findUsername) {
        alert('用户名不存在！')
        return
    }
    if (!findPassword) {
        alert('密码错误')
        return
    }
    alert('登录成功\n即将跳转首页')
    location.reload()
}
const showUser = ref(false)
function delete_user(value) {
    saveUser.value.splice(value, 1)
    保存到内存(saveUser.value)
}
function 保存到内存(value) {
    window.localStorage.setItem('savaUser', JSON.stringify(value))
}
onMounted(() => {
    if (window.localStorage.getItem('savaUser')) {
        saveUser.value = JSON.parse(window.localStorage.getItem('savaUser'))
    }
})
</script>
<style scoped>
.login {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    position: relative;
}

.showUser {
    position: absolute;
    right: 0;
    top: 0;
    width: 300px;
    height: 100%;
    background: rgba(255, 255, 255, 0.6);
    backdrop-filter: blur(2px);
    transition: .3s;
    display: flex;
}

.showUser-setBtn {
    width: 30px;
    height: 20%;
    display: flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.8);
    transition: .2s;
    border-radius: 6px 0 0 6px;
    position: absolute;
    right: 100%;
    top: 0;
}

.showUser-setBtn:hover {
    background: rgba(228, 228, 228, 0.6);
}

.showUser.open {
    transform: translateX(0%);
}

.showUser.close {
    transform: translateX(100%);
}

.showUser.open .showUser-setBtn svg {
    transform: rotate(-.25turn)
}

.showUser.close .showUser-setBtn svg {
    transform: rotate(.25turn)
}

.showUser-body {
    flex: 1;
}

.showUser-ul {
    padding: 10px;
}

.showUser-ul-title {
    text-align: center;
    font-size: 16px;
    margin-bottom: 10px;
}

.showUser-item {
    padding: 5px;
    position: relative;
    transition: .2s;
    background: rgba(0, 128, 0, 0.2);
}

.showUser-item:hover {
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
}

.showUser-item:nth-child(2n) {
    background: rgba(0, 119, 128, 0.2);
}

.showUser-item:first-child {
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
}

.showUser-item:last-child {
    border-bottom-left-radius: 6px;
    border-bottom-right-radius: 6px;
}

.showUser-username span:last-child,
.showUser-password span:last-child {
    padding: 0 5px;
}

.delete_user {
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);
    opacity: 0;
    color: red;
    transition: .2s;
    cursor: pointer;
}

.showUser-item:hover>.delete_user {
    opacity: 1;
}


.login-body {
    width: 960px;
    height: 540px;
    background-size: cover;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.5);
    overflow: hidden;
    display: flex;
    position: relative;
}

.login-1,
.login-2 {
    position: absolute;
    width: 50%;
    height: 100%;
    left: 0;
    top: 0;
    background: rgba(235, 235, 235, 0.5);
    backdrop-filter: blur(2px);
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.login-2 {
    left: 50%;
}

.login-1-title {
    color: #107da5;
    text-align: center;
    font-size: 30px;
    font-weight: 600;
}

.img {
    position: absolute;
    width: 50%;
    height: 100%;
    top: 0;
    display: flex;
    overflow: hidden;
    transition: .3s;
}

.img>img {
    width: auto;
    transition: .3s;
}

.img-right {
    left: 50%;
}

.img-right>img {
    transform: translateX(-50%);
}

.img-left {
    left: 0%;
}

.img-left>img {
    transform: translateX(0%);
}

.login-1-input-group {
    width: fit-content;
    position: relative;
    margin-top: 30px;
}

.login-1-input-group-pl {
    position: absolute;
    left: 11px;
    top: 50%;
    transform: translateY(-50%);
    line-height: 1.1rem;
    color: #888888;
    transition: .2s;
}

.username,
.password {
    font-size: 15px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
    width: 300px;
}

.username:focus~.login-1-input-group-pl,
.username:empty~.login-1-input-group-pl,
.password:focus~.login-1-input-group-pl,
.password:empty~.login-1-input-group-pl {
    top: -50%;
    left: 0;
    transform: none;
}

.login-1-btn1 {
    font-size: 16px;
    font-family: "微软雅黑";
    width: 100px;
    margin-top: 30px;
    padding: 8px;
}

.goOther {
    margin-top: auto;
}

.goOther span {
    color: #585858;
}

.goOther span:hover {
    color: #000000;
    cursor: pointer;
}
</style>