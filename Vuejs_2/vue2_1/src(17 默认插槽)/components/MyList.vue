<template>
  <div class="myList">
    <h2>列表</h2>
    <slot>
      我是slot,无数据
    </slot>
    <!-- <ul>
      <li v-for="(data, index) in listdata" :key='index'>{{ data }}</li>
    </ul> -->
  </div>
</template>

<script>
export default {
  name: "MyList",
  props: ["listdata"]
}
</script>

<style scoped>
.myList {
  background: #ccc;
  width: fit-content;

}

h2 {
  background-color: #bbb;
  text-align: center;
}

ul {
  padding-right: 40px;
}
</style>