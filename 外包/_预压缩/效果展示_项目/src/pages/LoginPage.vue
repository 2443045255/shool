<template>
    <main>
        <section>
            <div class="login-main">
                <div class="login-body">
                    <div class="login-ul" :class="{ 'toreg': regUP }">
                        <div class="login">
                            <div class="login-title txt-center">
                                <h2>登录</h2>
                            </div>
                            <div class="login-info txt-center">
                                <span>账号个数:</span><span>{{ regAccount.length }}</span>
                            </div>
                            <div class="login-input-group">
                                <span>账号</span>
                                <input type="text" v-model="account">
                            </div>
                            <div class="login-input-group">
                                <span>密码</span>
                                <input type="password" v-model="password">
                            </div>
                            <div class="同意协议">
                                <input type="checkbox" name="" id="checkbox1" v-model="agreeXY">
                                <label for="checkbox1">同意用户隐私协议</label>
                            </div>
                            <div class="login-btn-group">
                                <button @click="登录()">登录</button>
                                <button @click="toReg()">注册账号</button>
                            </div>
                        </div>


                        <div class="login">
                            <div class="login-title txt-center">
                                <h2>注册</h2>
                            </div>
                            <div class="login-info txt-center">
                                <span>账号个数:</span><span>{{ regAccount.length }}</span>
                            </div>
                            <div class="login-input-group">
                                <span>账号</span>
                                <input type="text" v-model="account">
                            </div>
                            <div class="login-input-group">
                                <span>密码</span>
                                <input type="password" v-model="password">
                            </div>
                            <div class="同意协议">
                                <input type="checkbox" name="" id="checkbox2" v-model="agreeXY">
                                <label for="checkbox2">同意用户隐私协议</label>
                            </div>
                            <div class="login-btn-group">
                                <button @click="注册()">注册</button>
                                <button @click="toLogin()">去登录</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

</template>
<script setup>
import { ref } from 'vue';


const agreeXY = ref(false)
const account = ref('')
const password = ref('')
const regUP = ref(false)
function toLogin() {
    regUP.value = false
}
function toReg() {
    regUP.value = true
}
function 判断账号密码是否为空() {
    if (!account.value) {
        alert("账号为空")
        return false
    }
    if (!password.value) {
        alert("密码为空")
        return false
    }
}
function 判断同意协议() {
    if (!agreeXY.value) {
        alert("请同意协议")
        return false
    }
}
var regAccount = ref([])
function 注册() {
    if (判断账号密码是否为空() == false) return
    if (判断同意协议() == false) return
    var reginfo = {
        account: '',
        password: ''
    }

    reginfo["account"] = account.value
    reginfo["password"] = password.value
    regAccount.value.push(reginfo)
    account.value = ''
    password.value = ''
    alert('注册成功')
}
var loginAccount = ''
var loginPassword = ''
function 登录() {
    if (regAccount.value.length == 0) {
        alert("无账号，请注册")
        return
    }
    if (判断账号密码是否为空() == false) return
    if (判断同意协议() == false) return
    var isAccount = false
    var isPassword = false
    for (let i = 0; i <= regAccount.value.length - 1; i++) {
        if (account.value == regAccount.value[i]['account']) {
            isAccount = true
            loginAccount = account.value
            if (password.value == regAccount.value[i]['password']) {
                isPassword = true
                loginPassword = password.value
            }
        }
    }
    if (!isAccount) {
        alert('账号不存在')
        return
    }
    if (!isPassword) {
        alert('密码错误')
        return
    }
    if (isAccount && isPassword) {
        alert(`登录成功\n账号:${loginAccount}\n密码:${loginPassword}`)
        location.reload()
    }
}
</script>
<style scoped>
.toreg {
    transform: translateX(-50%);
}

main {
    flex: 1;
    display: flex;
    flex-direction: column;
}

section {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
}

.login-main {
    background: #ddd;
    padding: 15px;
    border-radius: 10px;
    width: 280px;
    overflow: hidden;
}

.login-body {
    width: 100%;
    overflow: hidden;
}

.login-ul {
    display: flex;
    width: 200%;
    transition: .3s;
}

.login {
    padding: 10px;
}

.login-input-group {
    display: flex;
    flex-direction: column;
    margin-top: 10px;
}

.login-input-group>span {
    font-size: 12px;
    color: #4e4e4e;
}

.login-input-group>input {
    padding: 5px;
}

.同意协议 {
    display: flex;
    margin-top: 5px;
}

.同意协议>input {
    width: fit-content;
    margin-right: 5px;
}

.同意协议>label {
    font-size: 12px;
    color: #4e4e4e;
}

.login-btn-group {
    margin-top: 20px;
    display: flex;
    justify-content: space-evenly;
}

.login-btn-group>button {
    width: 100%;
}
</style>