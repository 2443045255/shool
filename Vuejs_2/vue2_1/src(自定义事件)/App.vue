<template>
  <main>
    <MySchool1 :getSchoolName="getSchoolName" />

    <!-- 第一种写法 -->
    <MyStudent @getName="getStudentName" @test="info" />

    <!-- 第二种写法 -->
    <!-- <MyStudent ref="student" /> -->
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
    getSchoolName(name) {
      console.log("接收到了MySchool1的数据:", name);

    },
    getStudentName(name) {
      console.log("接收到了MyStudent的数据:", name);
    },
    info() {
      console.log("我是info事件");

    }
  },
  mounted() {
    // setTimeout(() => {
    //   this.$refs.student.$on("getName", (name) => {
    //     console.log("接收到了MyStudent的数据:", name);
    //   })
    // }, 3000);


    // this.$refs.student.$on("getName", this.getStudentName)

  },
  //监听
  watch: {

  }
}
</script>

<style></style>