<template>
  <div class="todo-header">
    <input type="text" placeholder="请输入你的任务名称，按回车键确认" @keyup.enter="add" />
  </div>
</template>

<script>
import { nanoid } from "nanoid";
export default {
  name: "HeaderView",
  // props: ["addTodo"],
  methods: {
    add(e) {
      if (e.target.value == "") {
        alert("请输入内容");
      }
      // console.log(e.target.value);
      // 创建新的对象
      const todo = { id: nanoid(), title: e.target.value, done: false };
      // console.log(todo);
      // 将对象存放在数组中
      // this.addTodo(todo);
      this.$emit("addTodo", todo)
      e.target.value = "";
    },
  },
};
</script>

<style scoped>
.todo-header input {
  width: 560px;
  height: 28px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 4px 7px;
}

.todo-header input:focus {
  outline: none;
  border-color: rgba(82, 168, 236, 0.8);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075),
    0 0 8px rgba(82, 168, 236, 0.6);
}
</style>