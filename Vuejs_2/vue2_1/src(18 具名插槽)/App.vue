<template>
  <div class="app">
    <MyList>
      <template v-slot:top>
        <h2>列表一</h2>
      </template>
      <template v-slot:center>
        <ul>
          <li v-for="(data, index) in foods" :key="index">{{ data }}</li>
        </ul>
      </template>
      <template #bottom>
        <a href="#">更多</a>
      </template>
    </MyList>
    <MyList>
      <template v-slot:top>
        <h2>列表二</h2>
      </template>
      <template v-slot:center>
        <ul>
          <li v-for="(data, index) in games" :key="index">{{ data }}</li>
        </ul>
      </template>
      <template #bottom>
        <a href="#">查看</a>
      </template>
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
</script>

<style>
* {
  box-sizing: border-box;
}

.app {
  display: flex;
  align-items: start;
}
</style>