import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const state = {
  event: {
    name: '',
    from: '',
    to: '',
    day: '',
  },
  save: false,
}

const mutations = {
  updateEventName(state, payload) {
    state.event.name = payload
  },
  saveEvent(state) {
    if (state.save === false) {
      state.save = true
      console.log(state.save)

      setTimeout(() => {
        state.save = false
        console.log(state.save)
      }, 2000)
    }
  }
}

const getters = {}

const actions = {
  updateEventName({ commit }, payload) {
    if (payload) {
      commit('updateEventName', payload)
    }
  }
}

export default new Vuex.Store({
    state,
    getters,
    mutations,
    actions,
})