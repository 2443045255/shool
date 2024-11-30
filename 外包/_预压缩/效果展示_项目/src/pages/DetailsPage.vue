<template>
  <main>
    <h2>详情</h2>
    <section>
      <div class="module" style="width: fit-content;margin: auto;">
        <div class="module-body">
          <h3 class="txt-center">父组件</h3>
          <div class="perent">
            <div class="sendValue">
              <span>发给子组件的值：</span>
              <input type="text" v-model="perentSend" style="width: 200px;">
            </div>|
            <div class="getValue">
              <p>来自子组件的值：</p>
              <p style="width: 200px;">{{ perentget }}</p>
            </div>
          </div>
          <SendValue :msg="perentSend" @childSend="getChildValue" />
        </div>

      </div>
      <div class="module">
        <div class="module-title">
          <span>插槽</span>
          <div class="module-btn-group">
            <button class="module-btn module-hide-btn" @click="随机图片(Number(num1))">随机图片</button>
            <p style="margin-left: 10px;">数量: <input type="num" v-model="num1"></p>
          </div>
        </div>
        <div class="module-body">
          <div class="grid">
            <SlotOne v-for="key in Number(num1)" :key="key">
              <template #col-card-img>
                <img alt="" :src="imgUrl[key > 4 ? key = key % 4 : key]">
              </template>
              <template #col-card-title>
                <h3>你好世界</h3>
              </template>
              <template #col-card-text>
                <p>测试文本测试文本</p>
              </template>
            </SlotOne>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>
<script setup>
import SlotOne from '@/components/SlotOne.vue';
import SendValue from '@/components/SendValue.vue';
import { ref } from 'vue';

const perentSend = ref('')
const perentget = ref('')
function getChildValue(value) {
  perentget.value = value
}
const num1 = ref(6)
const imgUrl = ref([])
随机图片(6)
function 随机图片(value) {
  imgUrl.value = []
  var imgIndex = []
  for (let i = 0; i <= value; i++) {
    var random = Math.floor(Math.random() * 4) + 1
    if (random == imgIndex[i - 1]) {
      i--
      continue
    }
    imgIndex.push(random)
    imgUrl.value.push(`/public/images/0${imgIndex[i]}.jpg`)
  }
}
</script>
<style scoped>
.perent {
  margin-top: 5px;
  display: flex;
}

.sendValue {
  padding-right: 20px;
}

.getValue {
  padding-left: 20px;
  display: flex;
}

.grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 10px;
}
</style>