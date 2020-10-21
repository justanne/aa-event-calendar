import Vue from 'vue'
import Vuex from 'vuex'
import Axios from 'axios'

Vue.use(Vuex)

const state = {
  event: {
    name: '',
    from: '',
    to: '',
    day: '',
  },
  save: false,
  passed: false,
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
      }, 1000)
    }
  },
  updatePassingStatus(state, payload) {
    state.passed = payload
    setTimeout(() => {
      state.passed = false
    }, 5000)
  },
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
  },
  saveEventDetails({ state, commit, dispatch }) {
    commit('saveEventDetails')
    if (state.event) {
      dispatch('saveDataToDB')
    }
  },
  saveDataToDB({ commit }) {
    return new Promise((resolve, reject) => {
        Axios.post('/save-to-db', state.event)
            .then(response => {
              if (response.data.passes) {
                commit('updatePassingStatus', response.data.passes)
              }
              else {
                console.error(response.error)
              }
              resolve(response)
            })
            .catch(err => {
                console.error(response.error)
                reject(err)
            })
    })
  },
}

export default new Vuex.Store({
    state,
    getters,
    mutations,
    actions,
})