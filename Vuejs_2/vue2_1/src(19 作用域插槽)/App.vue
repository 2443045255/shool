<template>
  <div class="app">
    <MyList :listdata="list1">
      <template #default="object">
        <button @click="del(object.data.id)">删除</button>
      </template>
    </MyList>

    <MyList :listdata="list2">
      <template #default="object">
        <button @click="show(object.data)">查看</button>
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
      list1: [
        { id: 1, name: "张三", age: "18" },
        { id: 2, name: "李四", age: "19" },
        { id: 3, name: "王五", age: "20" },
      ],
      list2: [
        { id: 1, name: "张三", age: "22" },
        { id: 2, name: "李四", age: "23" },
        { id: 3, name: "王五", age: "24" },
      ]
    }
  },
  methods: {
    del(id) {
      this.list1 = this.list1.filter((item) => {
        return item.id != id
      })
    },
    show(data) {
      alert(`序号:${data.id} 姓名:${data.name} 年龄:${data.age}`)
    }
  }
}
</script>

<style></style>