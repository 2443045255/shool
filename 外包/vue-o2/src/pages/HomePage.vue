<template>
    <main>
        <div class="topImg">
            <div class="img">
                <img src="/public/images/topImg1.jpg" alt="">
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
    </main>
</template>
<script setup>
import { onMounted, ref } from 'vue';

var LBimgName = [
    '/public/images/LB-img1.png',
    '/public/images/LB-img2.png',
    '/public/images/LB-img3.png',
    '/public/images/LB-img4.png',
    '/public/images/LB-img5.jpg',
    '/public/images/LB-img6.jpg',
    '/public/images/LB-img7.jpg',
    '/public/images/LB-img8.jpg',
    '/public/images/LB-img9.jpg',
    '/public/images/LB-img10.jpg',
    '/public/images/LB-img11.jpg',
    '/public/images/LB-img12.jpg',
]
const LBimgActive = ref(0)
const LBimg_time = ref(3)
function 切换图片(value) {
    var activeImg = document.createElement('div')
    activeImg.className = 'img LBimg-body-imgActive'
    var img = document.createElement('img')
    img.src = value
    activeImg.append(img)
    document.querySelector(".LBimg-body").append(activeImg)
    setTimeout(() => {
        document.querySelector(".LBimg-body-img1 img").src = value
        activeImg.remove()
    }, 200);
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
onMounted(() => {
    LBimg_func(true)


})
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
</style>