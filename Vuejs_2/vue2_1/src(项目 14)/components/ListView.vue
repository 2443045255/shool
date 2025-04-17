<template>
  <ul class="todo-main">
    <ItemView v-for="todoObj in todos" :key="todoObj.id" :todoObj="todoObj" />
  </ul>
</template>

<script>
import ItemView from "./ItemView.vue";

export default {
  name: "ListView",
  components: {
    ItemView,
  },
  props: ["todos"],
};
</script>

<style scoped>
.todo-main {
  margin-left: 0px;
  border: 1px solid #ddd;
  border-radius: 2px;
  padding: 0px;
}

.todo-empty {
  height: 40px;
  line-height: 40px;
  border: 1px solid #ddd;
  border-radius: 2px;
  padding-left: 5px;
  margin-top: 10px;
}
</style>