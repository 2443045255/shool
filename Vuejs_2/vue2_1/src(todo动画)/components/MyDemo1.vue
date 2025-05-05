<template>
  <div class="MyDemo1">
    <button @click="isShow = !isShow">显示隐藏</button>

    <!-- <transition name="hello">
      <h2 v-show="isShow">下午好</h2>
    </transition> -->

    <transition-group name="hello">
      <h2 v-show="isShow" key="1">下午好</h2>
      <h2 v-show="isShow" key="2">下午好</h2>
    </transition-group>
  </div>
</template>

<script>
export default {
  name: "MyDemo1",

  data() {
    return {
      isShow: true
    }
  }
}
</script>
<style scoped>
h2 {
  background-color: rgb(205, 112, 50);
  transition: 1s linear;
}

.hello-enter {
  transform: translateX(-100%);
}

.hello-enter-to {
  transform: translateX(0);
}

.hello-leave {
  transform: translateX(0);
}

.hello-leave-to {
  transform: translateX(-100%);
}
</style>