require('./bootstrap');

import Vue from 'vue'

import EventName from './components/EventName'
import InputDate from './components/InputDate'
import InputCheckboxGroup from './components/InputCheckboxGroup'

const isProd = process.env.NODE_ENV === 'production'

Vue.config.devtools      = isProd ? false : true
Vue.config.productionTip = isProd ? false : true
Vue.config.silent        = isProd ? true  : false
Vue.config.debug         = isProd ? false : true

new Vue({
  el: '#app',
  components: {
    EventName,
    InputDate,
    InputCheckboxGroup,
  },
})
