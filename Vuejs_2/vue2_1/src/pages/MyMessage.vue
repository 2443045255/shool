<template>
  <ul>
    <li v-for="(item) in msgList" :key="item.id">
      <!-- 传固定数据 -->
      <!-- <router-link to="/Home/MyMessage/Myinfo?id=6&title=9">{{ item.title }}</router-link> -->
      <!-- 传指定数据 -->
      <!-- <router-link :to="`/Home/MyMessage/Myinfo?id=${item.id}&title=${item.title}`">{{ item.title }}</router-link> -->
      <!-- 方法三 -->
      <!-- <router-link :to="{
        // path: '/Home/MyMessage/Myinfo',
        name: 'Info',
        query: {
          id: item.id,
          title: item.title
        }
      }">{{ item.title }}</router-link> -->
      <!-- params方法 -->
      <!-- <router-link :to="`/Home/MyMessage/Myinfo/${item.id}/${item.title}`">{{ item.title }}</router-link> -->
      <!-- params只能使用name -->
      <router-link :to="{
        name: 'Info',
        params: {
          id: item.id,
          title: item.title
        }
      }">{{ item.title }}</router-link>
    </li>
    <router-view></router-view>
  </ul>
</template>

<script>
export default {
  name: "MyMessage",
  data() {
    return {
      msgList: [
        {
          id: "1",
          title: "n1"
        },
        {
          id: "2",
          title: "n2"
        },
        {
          id: "3",
          title: "n3"
        }
      ]
    }
  }
}
</script>

<style></style>