import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  strict: process.env.NODE_ENV !== 'production',
  modules: {},
  state: {
    drawer: true,
  },
  mutations: {
    SET_DRAWER (state, v) {
      state.drawer = v
    },
  },
})
