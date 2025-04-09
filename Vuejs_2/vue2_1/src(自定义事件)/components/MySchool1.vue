<template>
  <div class="shcool">
    <h2>{{ name }}</h2>
    <h2>{{ address }}</h2>
    <button @click="sendSchoolName">点击将学校名字给APP组件</button>
  </div>
</template>
<script>
export default {
  name: "MySchool1",
  props: ["getSchoolName"],
  data() {
    return {
      name: "学院",
      address: "仙游"
    }
  },
  methods: {
    sendSchoolName() {
      this.getSchoolName(this.name)
    }
  }
}
</script>
<style scoped>
.shcool{
  background-color: yellow;
}
</style>