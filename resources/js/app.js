require('./bootstrap');

import Vue from 'vue'
import store from './store/index'

import InputEventName from './components/InputEventName'
import InputDate from './components/InputDate'
import InputCheckboxGroup from './components/InputCheckboxGroup'
import TableEventMonthly from './components/TableEventMonthly'

import { mapState } from 'vuex'

const isProd = process.env.NODE_ENV === 'production'

Vue.config.devtools      = isProd ? false : true
Vue.config.productionTip = isProd ? false : true
Vue.config.silent        = isProd ? true  : false
Vue.config.debug         = isProd ? false : true

new Vue({
  store,
  el: '#app',
  components: {
    InputEventName,
    InputDate,
    InputCheckboxGroup,
    TableEventMonthly,
  },
  computed: {
    ...mapState([
      'passed'
    ])
  },
  methods: {
    saveEvent() {
      this.$store.dispatch('saveEventDetails')
    }
  },
})
