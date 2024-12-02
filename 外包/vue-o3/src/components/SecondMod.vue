<template>
    <div class="second-mod">
        <div class="SM-title">
            <span>推荐好书</span>
            <div class="SM-seeMore a">更多</div>
        </div>
        <div class="SM-body">
            <div class="SM-item a" v-for="value in books" :key="value">
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
import { ref } from 'vue';

var url1 = '/public/images/book/'
const books = ref([
    ['1.jpg', '你笑了生活就笑了', '11.99'],
    ['2.jpg', '文豪笔下的文豪', '25.99'],
    ['3.jpg', '重新学会学习：善用AI新工具10倍提效', '13.93'],
    ['4.jpg', '零基础学Python编程实战', '11.99'],
    ['5.jpg', '数字化工程项目管理：思维模式与实施方法', '25.99'],
    ['6.jpg', '学习力跃迁：像AI一样迭代自己', '13.93'],
    ['7.jpg', '世界尽头的疯人院：“比利时号”南极之旅', '11.99'],
    ['8.jpg', 'Python时间序列预测', '25.99'],
    ['9.jpg', '陶器猴子', '13.93'],
])
</script>
<style scoped>
.second-mod {
    background: #f4f4f4;
    margin: 10px;
    padding: 15px;
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
.SM-seeMore{
    border: 1px solid;
    color: #aaa;
    font-size: 15px;
    padding: 3px 10px;
    border-radius: 4px;
    transition: .2s;
}
.SM-seeMore:hover{
    color: black;
}
.SM-body{
    display: grid;
    grid-template-columns: repeat(4,1fr);
    gap: 15px;
}
.SM-item{
    text-decoration: none;
    background-color: #fff;
    padding: 10px;
    border-radius: 6px;
    display: flex;
    flex-direction: column;
    transition: .3s;
}
.SM-item:hover{
    transform: translateY(-1%);
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
}
.SM-item-img{
    height: 260px;
    border-radius: 6px;
    overflow: hidden;
}
.SM-item-img>img{
    object-fit: contain;
}
.SM-item-title{
    font-size: 20px;
    padding: 10px;
}
.SM-item-price{
    font-size: 16px;
    margin-top: auto;
    padding: 0 10px;
    color: #FA2B1A;
}
.SM-item-price::before{
    content: '￥';
}
</style>