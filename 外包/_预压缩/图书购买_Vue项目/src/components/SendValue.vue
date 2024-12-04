<script setup>
import { ref, defineEmits } from 'vue';

{/* <HelloWorld msg="You did it!" /> */ }
defineProps({
  msg: {
    type: String,
    required: true,
  },
})

const emit = defineEmits(['childSend']);


const childSend = ref('')
function childSend1() {
  emit("childSend", childSend.value)
}
</script>

<template>
  <h3 class="txt-center">子组件</h3>
  <div class="child">
    <div class="getValue">
      <p>来自父组件的值：</p>
      <p style="width: 200px;">{{ msg }}</p>
    </div>|
    <div class="sendValue">
      <span>发给父组件的值：</span>
      <input type="text" v-model="childSend" style="width: 200px;" @input="childSend1()">
    </div>
  </div>
</template>

<style scoped>
h3 {
  margin-top: 5px;
}

.child {
  display: flex;
  margin-top: 5px;
}

.sendValue {
  padding-left: 20px;
}

.getValue {
  padding-right: 20px;
  display: flex;
}
</style>
