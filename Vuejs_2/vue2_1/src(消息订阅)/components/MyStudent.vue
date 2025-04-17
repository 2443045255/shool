<template>
  <div class="student">
    <h2>{{ name }}</h2>
    <h2>{{ age }}</h2>
    <button @click="sendName">点击把学生的名字给School</button>
  </div>
</template>
<script>
import pubsub from 'pubsub-js';
export default {
  name: "MyStudent",
  data() {
    return {
      name: "张三",
      age: "18"
    }
  },
  methods: {
    sendName() {
      // this.$bus.$emit("getName", this.name)
      pubsub.publish("getName",this.name)
    }
  }
}
</script>
<style scoped>
.student {
  background-color: aqua;
}
</style>