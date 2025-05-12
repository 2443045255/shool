const state = {
  userInfo: {
    name: "zhangsan",
    age: 18
  },
  score: 90,
  sport: "basketball"
}
const mutations = {
  changeUserName(state, newName) {
    state.userInfo.name = newName
  }
}
const actions = {
  changeNameOne(context, newName) {
    setTimeout(() => {
      context.commit("changeUserName", newName)
    }, 1000);
  }
}
const getters = {
  upperName(state){
    return state.userInfo.name.toUpperCase()
  }
}

export default {
  namespaced: true,
  state,
  mutations,
  actions,
  getters
}