<template>
    <main>
        <div class="topImg">
            <div class="img">
                <img src="/images/topImg1.jpg" alt="">
            </div>
            <div class="topImg-Txt topImg-Txt1">
                <p class="p1">
                    <span class="你">你</span>
                    <span class="的">的</span>
                    <span class="名">名</span>
                    <span class="字">字</span>
                    <span class="结尾">。</span>
                </p>
                <p class="p2 t-center"><span>y o u r</span><span>n a m e.</span></p>
            </div>
            <div class="topImg-Txt topImg-Txt2">
                2016.12.02
            </div>
        </div>

        <div class="LBimg">
            <div class="LBimg-title">
                <span>电影海报</span>
                <div class="LBimg-time">
                    <span>倒计时 : </span>
                    <span>{{ LBimg_time }}</span>
                    <button @click="LBimg_func(!LBimg_setInterval_active)"
                        :class="[{ '开始': !LBimg_setInterval_active }, { '停止': LBimg_setInterval_active }]">计时</button>
                    <button @click="randomImg()">随机图片</button>
                </div>
            </div>
            <div class="LBimg-body">
                <div class="img LBimg-body-img1"><img id="LBimgImg" :src="LBimgName[0]" alt=""></div>
            </div>
            <div class="LBimg-item">
                <div class="LBimg-item-img" v-for="(key, index) in LBimgName" :key="index"
                    :class="{ 'active': index == LBimgActive }" @click="LBimgActive = index; 切换图片(key)"><img :src="key"
                        alt="">
                </div>
            </div>
        </div>

        <div class="LXwe">
            <div class="LXwe-title">联系我们</div>
            <div class="LXwe-body">
                <div class="flex" style="align-items: center;justify-content: center;">
                    <div class="LXwe-input-group m-l-15px">
                        <p>昵称</p>
                        <input type="text" class="input-text" v-model="userName">
                    </div>
                    <div class="LXwe-input-group m-l-15px">
                        <p>邮箱</p>
                        <input type="email" class="input-text" style="width: 300px;" v-model="userEmail">
                    </div>
                    <button class="m-l-15px" style="margin-top: auto;" @click="sendmsg()">发送</button>
                </div>
                <div class="flex" style="justify-content: center;margin-top: 10px;">
                    <div class="LXwe-input-group">
                        <p>消息</p>
                        <textarea name="" id="" cols="100" rows="7" v-model="userMsg"></textarea>
                    </div>
                </div>
            </div>
            <div class="LXwe-msg">
                <div class="LXwe-msg-title">历史信息</div>
                <div class="LXwe-msg-body">
                    <div class="LXwe-msg-one" v-for="key in msgArray" :key="key">
                        <div class="LXwe-msg-user flex">
                            <div class="LXwe-msg-name">{{ key['name'] }}</div>
                            <div class="LXwe-msg-email">{{ key['email'] }}</div>
                        </div>
                        <div class="LXwe-msg-txt">{{ key['msg'] }}</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
<script setup>
import { onMounted, onUnmounted, ref } from 'vue';
onMounted(() => {
    LBimg_func(true)
})

onUnmounted(() => {
    LBimg_func(false)
})
var LBimgName = [
    '/images/LB-img1.png',
    '/images/LB-img2.png',
    '/images/LB-img3.png',
    '/images/LB-img4.png',
    '/images/LB-img5.jpg',
    '/images/LB-img6.jpg',
    '/images/LB-img7.jpg',
    '/images/LB-img8.jpg',
    '/images/LB-img9.jpg',
    '/images/LB-img10.jpg',
    '/images/LB-img11.jpg',
    '/images/LB-img12.jpg',
]
const LBimgActive = ref(0)
const LBimg_time = ref(3)
function 切换图片(value) {
    var activeImg = document.createElement('img')
    activeImg.className = 'img LBimg-body-imgActive'
    activeImg.src = value
    document.querySelector(".LBimg-body").append(activeImg)
    setTimeout(() => {
        document.querySelector(".LBimg-body-img1 img").src = value
        activeImg.remove()
    }, 300);
}
var LBimg_setInterval;
const LBimg_setInterval_active = ref(true)
function LBimg_func(value) {
    if (value) {
        LBimg_setInterval_active.value = true
        LBimg_setInterval = setInterval(() => {
            LBimg_time.value--
            if (LBimg_time.value == 0) {
                LBimgActive.value + 1 >= LBimgName.length ? LBimgActive.value = 0 : LBimgActive.value++
                切换图片(LBimgName[LBimgActive.value])
                LBimg_time.value = 3
            }
        }, 1000);
    } else {
        LBimg_setInterval_active.value = false
        clearInterval(LBimg_setInterval)
    }
}
function randomImg() {
    LBimg_setInterval_active.value ? LBimg_func(false) : null
    var random = Math.floor(Math.random() * LBimgName.length)
    切换图片(LBimgName[random])
}

const userName = ref('')
const userEmail = ref('')
const userMsg = ref('')
const msgArray = ref([])
function sendmsg() {
    if (!userName.value) {
        alert('昵称为空')
        return
    }
    if (!userEmail.value) {
        alert('邮箱为空')
        return
    }
    if (!userMsg.value) {
        alert('信息为空')
        return
    }
    var msg = {}
    msg['name'] = userName.value
    msg['email'] = userEmail.value
    msg['msg'] = userMsg.value
    msgArray.value.push(msg)
    userMsg.value = ''
}
</script>
<style>
.topImg {
    position: relative;
}

.topImg .img {
    max-height: 600px;
    min-height: 500px;
    overflow: hidden;
    display: flex;
    align-items: center;
}

.topImg-Txt {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    font-weight: 200;
    color: white;
    text-shadow: 0px 0px 10px #094C9E;
    font-family: 宋体;
}

.topImg-Txt1 {
    top: 5%;
}

.topImg-Txt1 .p1 {
    position: relative;
}

.topImg-Txt1 .p1 span {
    margin: 10px;
}

.topImg-Txt1 .你 {
    font-size: 80px;
}

.topImg-Txt1 .的 {
    font-size: 60px;
}

.topImg-Txt1 .名 {
    font-size: 80px;
}

.topImg-Txt1 .字 {
    font-size: 80px;
}

.topImg-Txt1 .结尾 {
    position: absolute;
    top: 35%;
    left: 100%;
    font-size: 50px;
}

.topImg-Txt1 .p2 {
    font-family: 微软雅黑;
}

.p2>span {
    white-space: 5px;
    margin: 10px;
}

.topImg-Txt2 {
    bottom: 5%;
    font-size: 50px;
}

.LBimg {
    margin-top: 20px;
    border: 1px solid;
    border-radius: 6px;
}

.LBimg-title {
    font-size: 20px;
    padding: 10px 0;
    text-align: center;
    position: relative;
}

.LBimg-time {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: #5e5e5e;
    font-size: 16px;
}

.LBimg-body {
    max-height: 500px;
    overflow: hidden;
    display: flex;
    align-items: center;
    position: relative;
}

.LBimg-item {
    padding: 15px;
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 15px;
}

.LBimg-item-img {
    border-radius: 6px;
    overflow: hidden;
}

.LBimg-item-img>img {
    transition: .2s;
}

.LBimg-item-img>img:hover {
    transform: scale(1.1);
}

.LBimg-item-img.active {
    position: relative;
}

.LBimg-item-img.active::after {
    position: absolute;
    content: '';
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    border: 3px solid #bd6615;
    border-radius: 6px;
    pointer-events: none;
}

.LXwe {
    margin-top: 20px;
}

.LXwe-title {
    font-size: large;
}

.LXwe-input-group>p {
    font-size: 14px;
    color: #4d4d4d;
}

.LXwe-input-group>input {
    margin-top: 5px;
}

.LXwe-input-group>textarea {
    margin-top: 5px;
    padding: 3px;
    font-size: 15px;
    font-family: "微软雅黑";
    border-radius: 4px;
    border: 1px solid;
}

.LXwe-msg-title {
    font-size: 20px;
    text-align: center;
}

.LXwe-msg-body {
    padding: 10px;
    border: 1px solid;
    border-radius: 6px;
    height: 500px;
    overflow: auto;
}

.LXwe-msg-one {
    margin-bottom: 15px;
    border: 1px solid #aaa;
    border-radius: 4px;
    padding: 10px;
    position: relative;
}

.LXwe-msg-user {
    font-size: 14px;
    color: #4d4d4d;
    position: absolute;
    left: 10px;
    top: 0%;
    transform: translateY(-50%);
    padding: 2px 10px;
    background: white;
    border-radius: 4px;
}

.LXwe-msg-email {
    margin-left: 10px;
}

.LXwe-msg-txt {
    overflow-wrap: break-word;
    white-space: pre-wrap;
}
</style>