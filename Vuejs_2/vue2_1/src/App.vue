<template>
  <main>
    <div id="root">
      <div class="todo-container">
        <div class="todo-wrap">
          <HeaderView :addTodo="addTodo" />
          <ListView
            :todos="todos"
            :checkTodo="checkTodo"
            :deleteTodo="deleteTodo"
          />
          <FooterView />
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import HeaderView from "./components/HeaderView.vue";
import ListView from "./components/ListView.vue";
import FooterView from "./components/FooterView.vue";

export default {
  name: "App",
  components: {
    HeaderView,
    ListView,
    FooterView,
  },
  data() {
    return {
      todos: [
        { id: "001", title: "吃饭", done: false },
        { id: "002", title: "睡觉", done: true },
        { id: "003", title: "学习", done: false },
      ],
    };
  },
  methods: {
    addTodo(todo) {
      //将对象添加到数组
      this.todos.unshift(todo);
    },
    checkTodo(id) {
      this.todos.forEach((e) => {
        if (e.id == id) {
          e.done = !e.done;
        }
      });
    },
    deleteTodo(id) {
      this.todos = this.todos.filter((e) => {
        return e.id != id;
      });
    },
  },
};
</script>

<style>
body {
  background: #fff;
}

.btn {
  display: inline-block;
  padding: 4px 12px;
  margin-bottom: 0;
  font-size: 14px;
  line-height: 20px;
  text-align: center;
  vertical-align: middle;
  cursor: pointer;
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2),
    0 1px 2px rgba(0, 0, 0, 0.05);
  border-radius: 4px;
}

.btn-danger {
  color: #fff;
  background-color: #da4f49;
  border: 1px solid #bd362f;
}

.btn-danger:hover {
  color: #fff;
  background-color: #bd362f;
}

.btn:focus {
  outline: none;
}

.todo-container {
  width: 600px;
  margin: 0 auto;
}

.todo-container .todo-wrap {
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
}
</style>