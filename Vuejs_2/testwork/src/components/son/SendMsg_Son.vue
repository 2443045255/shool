<template>
  <div class="SendMsg_Son">
    <span>
      <slot></slot>--{{ item.name }}--{{ item.age }}
    </span><button @click="send">发送消息</button>
  </div>
</template>

<script>
export default {
  name: "SendMsg_Son",
  props: ["item", "sendMsg"],
  methods: {
    send() {
      this.sendMsg(this.item.name, this.item.age)
    }
  }
}
</script>

<style>
button {
  margin-left: 10px;
}
</style>