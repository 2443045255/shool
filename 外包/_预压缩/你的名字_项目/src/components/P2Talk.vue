<script setup>
import { ref } from 'vue';

const P2_talk = ref('')
defineProps({
  msg: {
    type: String,
    required: true,
  },
})

</script>

<template>
  <div class="talk-p talk-p2">
    <div class="talk-send">
      <span>要说的话:</span>
      <input type="text" class="input-text" v-model="P2_talk" @input="$emit('send', P2_talk)">
    </div>
    <div class="talk-get">
      <span>听到对面的话:</span>
      <span>{{ msg }}</span>
    </div>
  </div>
</template>

<style scoped></style>
