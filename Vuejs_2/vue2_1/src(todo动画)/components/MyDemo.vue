<template>
  <div class="MyDemo">
    <button @click="isShow = !isShow">显示隐藏</button>
    <transition name="hello">
      <h2 class="" v-show="isShow">下午好</h2>
    </transition>

  </div>
</template>

<script>
export default {
  name: "MyDemo",

  data() {
    return {
      isShow: true
    }
  }
}
</script>
<style scoped>
h2 {
  background-color: yellowgreen;
}

/* .come {
  animation: ani-hello 1s linear;
}

.go {
  animation: ani-hello 1s linear reverse;
} */

.hello-enter-active {
  animation: ani-hello 1s linear;
}

.hello-leave-active {
  animation: ani-hello 1s linear reverse;
}

/* 定义一个动画 */
@keyframes ani-hello {
  from {
    transform: translateX(-100%);
  }

  to {
    transform: translateX(0%);
  }
}
</style>