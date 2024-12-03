<template>
    <div class="second-mod">
        <div class="SM-title">
            <span>推荐好书</span>
            <div class="SM-seeMore a">更多</div>
        </div>
        <div class="SM-body">
            <div class="SM-item a1" v-for="value in books" :key="value" @click="toPage('InfoPage', value)">
                <div class="SM-item-img img">
                    <img :src="url1 + value[0]" alt="">
                </div>
                <div class="SM-item-title">
                    <span>{{ value[1] }}</span>
                </div>
                <div class="SM-item-price">
                    <span>{{ value[2] }}</span>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { inject, ref } from 'vue';

const ActivePage = inject('ActivePage')
const PageData = inject('PageData')
function toPage(page, data) {
    if (ActivePage.value == page) {
        PageData.value = data
        document.documentElement.scrollTop = 0
    }
    ActivePage.value = page
    PageData.value = data
}

var url1 = '/public/images/book/'
const books = ref([
    ['1.jpg', '你笑了生活就笑了', '11.99'],
    ['2.jpg', '文豪笔下的文豪', '25.99'],
    ['3.jpg', '重新学会学习：善用AI新工具10倍提效', '13.93'],
    ['4.jpg', '零基础学Python编程实战', '27.56'],
    ['5.jpg', '数字化工程项目管理：思维模式与实施方法', '71.94'],
    ['6.jpg', '学习力跃迁：像AI一样迭代自己', '32.1'],
    ['7.jpg', '世界尽头的疯人院：“比利时号”南极之旅', '35.2'],
    ['8.jpg', 'Python时间序列预测', '85.14'],
    ['9.jpg', '陶器猴子', '11.99'],
    ['10.jpg', '为什么少数人成功，多数人失败', '11.99'],
    ['11.jpg', '一个陌生女人的来信', '25.99'],
    ['12.jpg', '赚钱的艺术', '11.99'],
])
</script>
<style>
.SM-item:nth-child(8n-3),
.SM-item:nth-child(8n-2),
.SM-item:nth-child(8n-1),
.SM-item:nth-child(8n) {
    background-color: #ccc !important;
}


.SM-body {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
}

.SM-item {
    background-color: #e6e6e6;
    padding: 10px;
    border-radius: 6px;
    display: flex;
    flex-direction: column;
    transition: .2s;
}

.SM-item:hover {
    transform: translateY(-1%);
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
}

.SM-item-img {
    height: 260px;
    border-radius: 6px;
    overflow: hidden;
}

.SM-item-img>img {
    object-fit: contain;
}

.SM-item-title {
    font-size: 20px;
    padding: 10px;
}

.SM-item-price {
    font-size: 16px;
    margin-top: auto;
    padding: 0 10px;
    color: #FA2B1A;
}

.SM-item-price span {
    font-family: Arial;
    font-weight: 600;
}

.SM-item-price::before {
    content: '￥';
}
</style>
<style scoped>
.second-mod {
    background: #f4f4f4;
    margin-top: 20px;
    padding: 10px;
    border-radius: 6px;
}

.SM-title {
    font-size: 25px;
    font-weight: 600;
    padding-bottom: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.SM-seeMore {
    border: 1px solid;
    color: #aaa;
    font-size: 15px;
    padding: 3px 10px;
    border-radius: 4px;
    transition: .2s;
}

.SM-seeMore:hover {
    color: black;
}
</style>