import Vue from "vue";
import Vuex from "vuex";

import user from "./modules/user";
import cart from "./modules/cart";

//使用Vuex
Vue.use(Vuex);

//创建仓库
const store = new Vuex.Store({
  // 放数据
  state: {
    title: "App根组件",
    num: 0,
    list1: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
    list2: ["张三", "李四"]
  },
  // 事件
  mutations: {
    addOne() {
      this.state.num++
    },
    // 使用快捷参数
    addFive(state) {
      state.num += 5
    },
    // 接收数据
    addAll(state, n) {
      state.num += n
    },
    sub(state, n) {
      state.num -= n
    }
  },
  // 异步处理
  actions:{

  },
  // 数据二次处理
  getters: {
    filterList2(state) {
      return state.list2 = state.list2.filter((itme) => {
        return itme.indexOf("张") == 0//索引号,判断有无为-1
      })
    }
  },
  // 子模块
  modules:{
    user,
    cart
  }
})

// 暴露仓库
export default store;