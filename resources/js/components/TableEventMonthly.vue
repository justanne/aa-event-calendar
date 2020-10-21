<template lang="pug">
  .table.w-full.table-event
    div(
      v-for="(datum, i) in data"
      :key="datum+i"
      :class="{ 'bg-green-100': (days_selected.includes(datum.dateno.toLowerCase())) }"
    )
      span(class="inline-block w-3/12") {{ datum.dateno +' '+ datum.dayname }}
      span(class="inline-block w-9/12") {{ (days_selected.includes(datum.dateno.toLowerCase())) ? event_details.name : '' }}
</template>

<script>
import { mapState } from 'vuex'
import moment from 'moment'

export default {
  props: ['data'],
  data() {
    return {
      dayfrom: '',
      dayto: '',
      days_selected: [],
      event_details: {
        name: '',
        from: '',
        to: '',
        day: [],
      },
    }
  },
  computed: {
    ...mapState([
      'save',
      'event'
    ]),
  },
  watch: {
    save: function(n,o) {
      if(n === true) {
        this.event_details = this.event

        this.dayfrom = moment(this.event_details.from).get('date')
        this.dayto = moment(this.event_details.to).get('date')
        this.days_selected = []

        this.showEventName()
      }
    },
  },
  methods: {
    showEventName() {
      for (let day = 0; this.dayfrom <= this.dayto; this.dayfrom++) {
        this.data.forEach(daydetails => {
          this.filterDateNo(daydetails)
        })
      }
    },
    filterDateNo(daydetails) {
      if (this.dayfrom === parseInt(daydetails.dateno)) {
        this.filterDateName(daydetails)
      }
      return true
    },
    filterDateName(daydetails) {
      let dayname = daydetails.dayname.toLowerCase()

      if (this.event_details.day.includes(dayname)) {
        this.days_selected.push(daydetails.dateno)
      }
      return true
    },
  },
}
</script>

<style>

</style>