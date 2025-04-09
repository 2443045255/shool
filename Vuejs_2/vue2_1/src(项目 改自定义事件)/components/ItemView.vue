<template>
  <li>
    <label>
      <input type="checkbox" :checked="todoObj.done" @click="headleCheck" />
      <span>{{ todoObj.title }}</span>
    </label>
    <button class="btn btn-danger" @click="headleDelete">删除</button>
  </li>
</template>

<script>
export default {
  name: "ItemView",
  props: ["todoObj", "checkTodo", "deleteTodo"],
  methods: {
    headleCheck() {
      this.checkTodo(this.todoObj.id);
    },
    headleDelete(){
      this.deleteTodo(this.todoObj.id)
    }
  },
};
</script>

<style scoped>
/*item*/
li {
  list-style: none;
  height: 36px;
  line-height: 36px;
  padding: 0 5px;
  border-bottom: 1px solid #ddd;
}

li label {
  float: left;
  cursor: pointer;
}

li label li input {
  vertical-align: middle;
  margin-right: 6px;
  position: relative;
  top: -1px;
}

li button {
  float: right;
  display: none;
  margin-top: 3px;
}

li:hover button {
  display: block;
}
li:hover {
  background-color: #ddd;
}
li:before {
  content: initial;
}

li:last-child {
  border-bottom: none;
}
</style>