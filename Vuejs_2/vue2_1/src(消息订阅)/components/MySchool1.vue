<template>
  <div class="shcool">
    <h2>{{ name }}</h2>
    <h2>{{ address }}</h2>
  </div>
</template>
<script>
import pubsub from 'pubsub-js';
export default {
  name: "MySchool1",
  data() {
    return {
      name: "学院",
      address: "仙游"
    }
  },
  mounted() {
    // this.$bus.$on("getName", (name) => {
    //   console.log("收到了数据", name);
    // })
    this.pubID = pubsub.subscribe("getName", (_, data) => {
      console.log(data);

    })
  },
  beforeDestroy() {
    // this.$bus.$off("getName")
    pubsub.unsubscribe(this.pubID)
  }
}
</script>
<style scoped>
.shcool {
  background-color: yellow;
}
</style>