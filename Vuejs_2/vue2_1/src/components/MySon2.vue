<template>
  <div>
    <h3>MySon2子组件</h3>
    <p>Vuex中的数据是: <span>{{ $store.state.num }}</span></p>
    <button @click="sub(1)">值-1</button>
    <button @click="sub(5)">值-5</button>
    <button @click="sub(10)">值-10</button>

    <div>{{ filterList2 }}</div>

    <div class="cart">
      <div>sum: {{ $store.state.cart.sum }}</div>
      <div>sum: {{ sum }}</div>

      <div>price.foods: {{ $store.state.cart.price.foods }}</div>
      <div>price.foods: {{ price.foods }}</div>

      <div>price.games: {{ $store.state.cart.price.games }}</div>
      <div>price.games: {{ price.games }}</div>

      <button @click="changeGamesPrice()">修改cart.price.games为100</button>
      <button @click="showFoodsAndGamesSumWait()">2秒后显示food和game 10个的总价</button>
      <p>food总价: {{ sumPrice.foods }}</p>
      <p>game总价: {{ sumPrice.games }}</p>
    </div>
  </div>
</template>

<script>
import { mapState, mapMutations, mapActions, mapGetters } from 'vuex';

export default {
  name: "MySon2",
  mounted() {
    // console.log(this.$store);
  },
  methods: {
    ...mapMutations("cart", ["changeGamesPrice"]),
    ...mapActions("cart", ["showFoodsAndGamesSumWait"]),
    sub(n) {
      this.$store.commit("sub", n)
    }
  },
  computed: {
    ...mapState("cart", ["sum", "price", "sumPrice"]),
    ...mapGetters(["filterList2"])
  }
}
</script>

<style>
.cart {
  padding: 10px;
  border: 1px solid;
}
</style>