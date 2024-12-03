<template>
  <main>
    <div class="topBtn">
      <div class="goBack a" @click="goBack('HomePage')">返回</div>
    </div>
    <div class="show">
      <div class="show-img img">
        <img :src="imgurl + msg[0]" alt="">
      </div>
      <SoltShow>
        
      </SoltShow>
    </div>
  </main>
</template>
<script setup>
import SoltShow from '@/components/SoltShow.vue';

defineProps({
  msg: {
    type: Array,
    required: true,
    default: []
  },
})

const emit = defineEmits(['data'])
function goBack(page) {
  if (page) {
    emit('data', [page, []])
  }
}

const imgurl = '/public/images/book/'
</script>
<style scoped>
.topBtn {
  padding: 5px 0;
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

.show-text {
  flex: 1;
}
</style>