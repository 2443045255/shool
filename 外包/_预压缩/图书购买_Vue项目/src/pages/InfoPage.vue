<template>
  <main>
    <div class="topBtn">
      <div class="goBack a" @click="toPage('HomePage')">返回主页</div>
    </div>
    <div class="show">
      <div class="show-img img">
        <img :src="imgurl + msg[0]" alt="">
      </div>
      <SoltShow>
        <template #title>
          {{ msg[1] }}
        </template>
        <template #price>
          {{ msg[2] }}
        </template>
      </SoltShow>
    </div>

    <SecondMod />
  </main>
</template>
<script setup>
import SecondMod from '@/components/SecondMod.vue';
import SoltShow from '@/components/SoltShow.vue';
import { onActivated,inject } from 'vue';

const ActivePage = inject('ActivePage')
function toPage(value) {
  ActivePage.value = value
}
defineProps({
  msg: {
    type: Array,
    required: true,
  },
})
onActivated(() => {
    document.documentElement.scrollTop = 0
})

const imgurl = '/images/book/'
</script>
<style scoped>
.topBtn {
  padding-bottom: 15px;
}

.goBack {
  width: fit-content;
  padding: 5px 15px;
  border: 1px solid;
  border-radius: 4px;
  color: #aaa;
  transition: .1s;
}

.goBack:hover {
  color: black;
}

.show {
  display: flex;
  justify-content: space-between;
}

.show>div {
  height: 500px;
}

.show-img {
  border-radius: 4px;
  overflow: hidden;
  margin-right: 15px;
  max-width: 50%;
}

.show-img>img {
  object-fit: contain;
}
</style>