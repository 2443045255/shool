<template>
  <main>
    <SearchDiv @search="search()" />
    <div class="onSearch-title">
      <span>搜索结果</span>
    </div>
    <div class="SM-body">
      <div class="SM-item a1" v-for="value in search_on" :key="value" @click="toPage('InfoPage', value)">
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
  </main>
</template>
<script setup>
import { inject, onActivated, ref } from 'vue';
import SearchDiv from '@/components/SearchDiv.vue';

const PageData = inject('PageData')
const ActivePage = inject('ActivePage')
function toPage(page, data) {
  if (ActivePage.value == page) {
    PageData.value = data
    document.documentElement.scrollTop = 0
  }
  ActivePage.value = page
  PageData.value = data
}

const SearchTxt = inject('SearchTxt')

const search_on = ref([])
onActivated(() => {
  search()
})

function search() {
  if (!SearchTxt.value) return
  search_on.value = []
  for (let i = 0; i <= books.value.length - 1; i++) {
    if (books.value[i][1].indexOf(SearchTxt.value) != -1) {
      search_on.value.push(books.value[i])
    }
  }
}

var url1 = '/images/book/'
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
.onSearch-title{
  padding-bottom: 15px;
}
</style>