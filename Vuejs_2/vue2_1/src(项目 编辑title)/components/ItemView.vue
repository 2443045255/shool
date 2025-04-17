<template>
  <li>
    <label>
      <input type="checkbox" :checked="todoObj.done" @click="headleCheck" />
      <span v-show="!todoObj.isEdit">{{ todoObj.title }}</span>
      <input type="text" :value="todoObj.title" v-show="todoObj.isEdit" @blur="handelCancel(todoObj, $event)">
    </label>
    <button class="btn btn-danger" @click="headleDelete">删除</button>
    <button class="btn btn-danger" @click="headleWrite(todoObj)">编辑</button>
  </li>
</template>

<script>
import pubsub from "pubsub-js"

export default {
  name: "ItemView",
  props: ["todoObj"],
  methods: {
    headleCheck() {
      // this.checkTodo(this.todoObj.id);
      this.$bus.$emit("checkTodo", this.todoObj.id)
    },
    headleDelete() {
      // this.deleteTodo(this.todoObj.id)
      // this.$bus.$emit("deleteTodo", this.todoObj.id)
      pubsub.publish("deleteTodo", this.todoObj.id)
    },
    headleWrite(todoObj) {
      this.$set(todoObj, "isEdit", true)
    },
    handelCancel(todoObj, e) {
      todoObj.isEdit = false
      this.$bus.$emit("updateTodo", todoObj.id, e.target.value)
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