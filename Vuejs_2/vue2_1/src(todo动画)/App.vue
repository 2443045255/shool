<template>
  <div>
    <MyDemo />
    <MyDemo1 />
  </div>

</template>

<script>
import MyDemo from './components/MyDemo.vue';
import MyDemo1 from './components/MyDemo1.vue';

export default {
  name: "App",
  components: {
    MyDemo,
    MyDemo1
  }
}
</script>
<style scoped></style>