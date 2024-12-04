<template>
  <div class="show-text">
    <div class="show-title">
      <span>书名:</span>
      <span>
        <slot name="title"></slot>
      </span>
    </div>
    <div class="show-price">
      <span>价格:</span>
      <span>
        <slot name="price"></slot>
      </span>
    </div>
    <div class="chose-mount">
      <span>数量:</span>
      <div class="mountChange">
        <button @click="mount++">+</button>
        <p>{{ mount }}</p>
        <button @click="mount--">-</button>
      </div>
    </div>
    <div class="buy a1">立即购买</div>
  </div>
</template>
<script setup>
import { watch, ref } from 'vue';

const mount = ref(1)
watch(mount, (count, prevCount) => {
  if (count < 1) {
    mount.value = 1
  }
})

</script>
<style>
.show-text {
  flex: 1;
  font-size: 20px;
  display: flex;
  flex-direction: column;
}

.show-text>div {
  margin-bottom: 10px;
}

.show-text>div>span:first-child {
  margin-right: 10px;
  color: rgb(112, 112, 112);
}

.show-text>div>span:nth-child(2) {
  font-size: 22px;
}

.show-price>span:nth-child(2)::before {
  content: "￥";
  font-size: 16px;
}

.show-price>span:nth-child(2) {
  color: #FA2B1A;
}

.chose-mount {
  display: flex;
  align-items: center;
}

.mountChange {
  display: flex;
}

.mountChange button {
  display: block;
  border: 1px solid #aaa;
  border-radius: 4px;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 26px;
  height: 26px;
  user-select: none;
  font-size: 20px;
  line-height: 1.5;
}

.mountChange button:hover {
  background: #ccc;
}

.mountChange p {
  width: 80px;
  text-align: center;
}

.buy {
  background: #ff412f;
  padding: 10px 0;
  color: #fff;
  border-radius: 4px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: auto;
  transition: .1s;
  margin-bottom: 0px !important;
}

.buy:hover {
  background: #ff5a4a;
}

.buy:active {
  background: #ff3f2d;
}
</style>