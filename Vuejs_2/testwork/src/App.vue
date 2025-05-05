<template>
  <div class="app">
    <ShowData />
    <CountScore />

    <SendMsg />
  </div>
</template>

<script>
import CountScore from './components/CountScore.vue';
import SendMsg from './components/SendMsg.vue';
import ShowData from './components/ShowData.vue';

export default {
  name:"app",
  components:{
    ShowData,
    CountScore,
    SendMsg
  }
}
</script>

<style>

</style>