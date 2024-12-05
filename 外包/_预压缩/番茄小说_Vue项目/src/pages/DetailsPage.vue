<template>
  <main>
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
          <span>小说展示(插槽)</span>
          <div class="module-btn-group">
            <button class="module-btn module-hide-btn" @click="随机添加小说()">随机添加小说</button>
          </div>
        </div>
        <div class="module-body">
          <div class="grid">
            <SlotOne v-for="value in bookArray" :key="value">
              <template #img>
                <img alt="" :src="bookUrl + value[0]">
              </template>
              <template #title>
                <span>{{ value[1] }}</span>
              </template>
              <template #writer>
                <span>{{ value[2] }}</span>
              </template>
              <template #type>
                <span>{{ value[3] }}</span>
              </template>
              <template #time>
                <span>{{ value[4] }}</span>
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

const bookUrl = '/images/books/'
const bookArray = ref([
  ['1.jpg', '十日终焉', '杀虫队队员', '已完结', '2024-10-31'],
  ['2.jpg', '我在精神病院斩神', '三九音域', '已完结', '2024-10-31'],
  ['3.jpg', '我不是戏神', '三九音域', '已完结', '2024-10-31'],
  ['4.jpg', '天渊', '沐潇三生', '已完结', '2024-10-31'],
  ['5.jpg', '大一实习,你跑去749收容怪物', '我爱罗的沙', '已完结', '2024-10-31'],
  ['6.jpg', '颠,都颠,颠点好', '小盐子', '已完结', '2024-10-31'],

  ['1.jpg', '十日终焉', '杀虫队队员', '已完结', '2024-10-31'],
  ['2.jpg', '我在精神病院斩神', '三九音域', '已完结', '2024-10-31'],
  ['3.jpg', '我不是戏神', '三九音域', '已完结', '2024-10-31'],
  ['4.jpg', '天渊', '沐潇三生', '已完结', '2024-10-31'],
  ['5.jpg', '大一实习,你跑去749收容怪物', '我爱罗的沙', '已完结', '2024-10-31'],
  ['6.jpg', '颠,都颠,颠点好', '小盐子', '已完结', '2024-10-31'],
])

function 随机添加小说() {
  var random1 = Math.floor(Math.random() * bookArray.value.length);
  bookArray.value.push(bookArray.value[random1])
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
  gap: 15px;
  min-width: 1200px;
  padding: 15px;
}
</style>