<template>
  <div class="app">
    <!-- <MyList :listdata="foods"></MyList>
    <MyList :listdata="games"></MyList> -->

    <MyList v-for="(data2, index) in data1" :key="index">
      <ul>
        <li v-for="(data, index) in data2" :key="index">{{ data }}</li>
      </ul>
    </MyList>

  </div>
</template>

<script>
import MyList from './components/MyList.vue';

export default {
  name: "App",
  components: {
    MyList,
  },
  data() {
    return {
      data1: {
        foods: [
          "饭",
          "菜",
          "水果"
        ],
        games: [
          "王者",
          "铲铲"
        ]
      }
    }
  }
}
</script>

<style>
* {
  box-sizing: border-box;
}

.app {
  display: flex;
}
</style>