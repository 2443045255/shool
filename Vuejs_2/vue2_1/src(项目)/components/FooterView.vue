<template>
  <div class="todo-footer" v-show="todos.length">
    <label>
      <input type="checkbox" :checked="isAll" @click="checkAll" />
    </label>
    <span><span>已完成{{ doneTotal }}</span> / 全部{{ todos.length }}</span>
    <button class="btn btn-danger" @click="clearAll">清除已完成任务</button>
  </div>
</template>

<script>
export default {
  name: "FooterView",
  props: ["todos", "checkAllTodo", "clearTodo"],
  computed: {
    doneTotal() {
      let i = 0
      this.todos.forEach(item => {
        if (item.done) {
          i++
        }
      })
      return i
    },
    isAll() {
      return this.doneTotal == this.todos.length && this.todos.length > 0
    }
  },
  methods: {
    checkAll(e) {
      this.checkAllTodo(e.target.checked)
    },
    clearAll() {
      this.clearTodo()
    }
  }
}
</script>

<style scoped>
.todo-footer {
  height: 40px;
  line-height: 40px;
  padding-left: 6px;
  margin-top: 5px;
}

.todo-footer label {
  display: inline-block;
  margin-right: 20px;
  cursor: pointer;
}

.todo-footer label input {
  position: relative;
  top: -1px;
  vertical-align: middle;
  margin-right: 5px;
}

.todo-footer button {
  float: right;
  margin-top: 5px;
}
</style>