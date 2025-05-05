<template>
  <div class="SendMsg">
    <p>群消息：</p>
    <p v-show="someone">{{ someone }}说：我{{ age }}岁了</p>
    <p v-show="!someone">当前群消息为空</p>
    <SendMsg_Son v-for="(item, index) in girls" :key="index" :item="item" :sendMsg="sendMsg">{{ index + 1 }}
    </SendMsg_Son>
  </div>
</template>

<script>
import SendMsg_Son from './son/SendMsg_Son.vue';

export default {
  name: "SendMsg",
  components: {
    SendMsg_Son
  },
  data() {
    return {
      show: false,
      someone: '',
      age: '',
      girls: [
        { name: '小红', age: 20 },
        { name: '小荷', age: 21 },
        { name: '小兰', age: 22 }
      ]
    }
  },
  methods: {
    sendMsg(name, age) {
      this.someone = name
      this.age = age
    }
  }
}
</script>

<style>

</style>