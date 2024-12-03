<template>
  <div class="gotop a1" @click="gotop()" v-show="gotop_show">回到顶部</div>
</template>
<script setup>
import { ref } from 'vue';

const gotop_show = ref(false)
document.onscroll = function () {
  if (document.documentElement.scrollTop > 100) {
    gotop_show.value = true
  } else {
    gotop_show.value = false
  }
}
function gotop() {
  document.documentElement.scrollTop = 0
}
</script>
<style scoped>
.gotop {
  position: fixed;
  right: 20px;
  bottom: 50px;
  padding: 5px 15px;
  background: #ccc;
  border-radius: 6px;
}
</style>