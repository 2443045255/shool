<template>
  <div class="search">
    <div class="search-body">
      <input type="text" v-model="SearchTxt">
      <div class="search-btn a1" @click="search()">搜索</div>
    </div>
  </div>
</template>
<script setup>
import { inject, ref } from 'vue';

const ActivePage = inject('ActivePage')

function toPage(value) {
  ActivePage.value = value
}

const SearchTxt = inject('SearchTxt')

const emit = defineEmits(['search'])
function search() {
  if (!SearchTxt.value) { return }
  if(ActivePage.value=='SearchPage'){
    emit('search')
  }else{
    toPage('SearchPage')
  }
}
</script>
<style scoped>
.search {
  display: flex;
  justify-content: center;
  padding-bottom: 15px;
}

.search-body {
  display: flex;
  align-items: center;
  border: 2px solid #FA2B1A;
  padding-left: 5px;
}

.search-body>input {
  width: 400px;
  font-size: 18px;
  padding: 5px 0;
  outline: none;
}

.search-btn {
  display: flex;
  align-items: center;
  padding: 0 10px;
  background: #FA2B1A;
  color: white;
  height: 100%;
}
</style>