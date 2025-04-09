<template>
  <div class="shcool">
    <h2>{{ name }}</h2>
    <h2>{{ address }}</h2>
  </div>
</template>
<script>
export default {
  name: "MySchool1",
  data() {
    return {
      name: "学院",
      address: "仙游"
    }
  },
  mounted() {
    this.$bus.$on("getName", (name) => {
      console.log("收到了数据", name);
    })
    // this.$bus.$on("getName", (name) => {
    //   console.log("收到了数据", name);

    // })
  },
  beforeDestroy() {
    this.$bus.$off("getName")
  }
}
</script>
<style scoped>
.shcool {
  background-color: yellow;
}
</style>