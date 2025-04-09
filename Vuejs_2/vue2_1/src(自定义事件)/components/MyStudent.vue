<template>
  <div class="student">
    <h2>{{ name }}</h2>
    <h2>{{ age }}</h2>
    <button @click="sendStudentName">点击将学生名字给APP组件</button>
    <button @click="unbind">点击解绑事件</button>
  </div>
</template>
<script>
export default {
  name: "MyStudent",
  data() {
    return {
      name: "张三",
      age: "18"
    }
  },
  methods: {
    sendStudentName() {
      //触发父组件给的事件
      this.$emit("getName", this.name)
      this.$emit("test")
    },
    unbind() {
      // this.$off("getName")
      // this.$off(["getName", "test"])
      this.$off()
    }
  }
}
</script>
<style scoped>
.student {
  background-color: aqua;
}
</style>