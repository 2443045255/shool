<template>
  <div>
    <h2>{{ $store.state.title }}</h2>
    <h2>title</h2>
        
    <MySon1></MySon1>
    <MySon2></MySon2>
  </div>
</template>

<script>
import MySon1 from './components/MySon1.vue';
import MySon2 from './components/MySon2.vue';

export default {
  name:"App",
  components:{
    MySon1,
    MySon2
  },
  mounted(){
    // console.log(this.$store.state.title);
  },
}
</script>

<style>

</style>