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
    state.event.name = payload.event_value
  },
  updateEventDay(state, payload) {
    state.event.day = payload.event_value
  },
  updateEventFrom(state, payload) {
    state.event.from = payload.event_value
  },
  updateEventTo(state, payload) {
    state.event.to = payload.event_value
  },
  saveEventDetails(state) {
    if (state.save === false) {
      state.save = true

      setTimeout(() => {
        state.save = false
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
  },
  updateEventDetails({ commit }, payload) {
    switch (payload.event_type) {
      case 'eventname':
        commit('updateEventName', payload)
        break
      case 'eventday':
        commit('updateEventDay', payload)
        break
      case 'eventfrom':
        commit('updateEventFrom', payload)
        break
      case 'eventto':
        commit('updateEventTo', payload)
        break
      default:
        return false
    }
  }
}

export default new Vuex.Store({
    state,
    getters,
    mutations,
    actions,
})