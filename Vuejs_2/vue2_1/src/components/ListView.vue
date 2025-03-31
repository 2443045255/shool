<template>
  <ul class="todo-main">
    <ItemView v-for="todoObj in todos" :key="todoObj.id" :todoObj="todoObj" />
  </ul>
</template>

<script>
import ItemView from './ItemView.vue';

export default {
  name: "ListView",
  components: {
    ItemView
  },
  data() {
    return {
      todos: [
        { id: "001", title: "吃饭", done: false },
        { id: "002", title: "睡觉", done: true },
        { id: "003", title: "学习", done: false },
      ]
    }
  }
}
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