<template>
  <div>
    <h3>MySon1子组件</h3>
    <!-- 拿到仓库数据 方法一 -->
    <!-- <p>Vuex中的数据是: <span>{{ $store.state.num }}</span></p> -->

    <p>Vuex中的数据是: <span>{{ num }}</span></p>
    <button @click="add1">值+1</button>
    <button @click="add5">值+5</button>
    <button @click="add(10)">值+10</button>

    <div class="user">
      <div>user中的名字是: {{ $store.state.user.userInfo.name }}</div>
      <div>user中的成绩是: {{ $store.state.user.score }}</div>
      <div>user中的名字是: {{ user.userInfo.name }}</div>
      <div>user中的名字是: {{ userInfo.name }}</div>
      <div>user中的成绩是: {{ score }}</div>

      <button @click="changeName('LiSi')">点击将名字换成 LiSi 方法一</button>
      <button @click="changeUserName('LiSi')">点击将名字换成 LiSi 方法二</button>

      <button @click="changeNameWait('LiSi')">一秒后将名字改成 LiSi</button>
      <button @click="changeNameOne('LiSi')">一秒后将名字改成 LiSi</button>

      <div>{{ $store.getters["user/upperName"] }}</div>
      <div>{{ upperName }}</div>
    </div>
  </div>
</template>

<script>
import { mapState, mapMutations, mapActions, mapGetters } from "vuex";

export default {
  name: "MySon1",
  mounted() {
    // console.log(this.$store);
  },
  computed: {
    ...mapState(["num", "user"]),
    // 映射子模块中的所有数据
    ...mapState("user", ["userInfo", "score"]),
    ...mapGetters("user", ["upperName"])
  },
  methods: {
    ...mapMutations("user", ["changeUserName"]),
    ...mapActions("user", ["changeNameOne"]),

    add1() {
      this.$store.commit("addOne")
    },
    add5() {
      this.$store.commit("addFive")
    },
    add(n) {
      this.$store.commit("addAll", n)
    },
    changeName(newName) {
      // this.$store.commit("user/changeUserName", newName)
      this.changeUserName(newName)
    },
    changeNameWait(newName) {
      // 调用actives 方法 despatch
      this.$store.dispatch("user/changeNameOne", newName)
    }
  },
};
</script>

<style></style>