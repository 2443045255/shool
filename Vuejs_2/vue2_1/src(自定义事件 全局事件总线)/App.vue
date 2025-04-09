<template>
  <main>
    <MySchool1 />
    <MyStudent />
  </main>
</template>

<script>
import MySchool1 from './components/MySchool1.vue';
import MyStudent from './components/MyStudent.vue';

export default {
  name: "App",
  components: {
    MySchool1,
    MyStudent
  },
  data() {
    return {

    };
  },
  methods: {

  },
  mounted() {

  },
  //监听
  watch: {

  }
}
</script>

<style></style>