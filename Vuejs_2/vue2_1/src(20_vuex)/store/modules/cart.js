const state = {
  sum: 0,
  price: {
    foods: 80,
    games: 90
  },
  sumPrice: {
    foods: 0,
    games: 0
  }
}
const mutations = {
  changeGamesPrice(state) {
    state.price.games = 100
  },
  showFoodsSum(state) {
    state.sumPrice.foods = state.price.foods * 10
  },
  showGamesSum(state) {
    state.sumPrice.games = state.price.games * 10
  }
}
const actions = {
  showFoodsAndGamesSumWait(context) {
    setTimeout(() => {
      context.commit("showFoodsSum")
      context.commit("showGamesSum")
    }, 2000);
  }
}
const getters = {
}

export default {
  namespaced: true,
  state,
  mutations,
  actions,
  getters
}