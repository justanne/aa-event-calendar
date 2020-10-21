<template lang="pug">
  .table.w-full.table-event
    div(
      v-for="(datum, i) in data"
      :key="datum+i"
      :class="{ 'bg-green-100': event_details.name }"
    )
      span(class="inline-block w-3/12") {{ datum.dateno +' '+ datum.dayname }}
      span(class="inline-block w-9/12") {{ event_details.name }}
</template>

<script>
import { mapState } from 'vuex'

export default {
  props: ['data'],
  data() {
    return {
      event_details: {
        name: '',
        from: '',
        to: '',
        day: '',
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
      console.log('Saved? ', n)
      if(n === true) {
        this.event_name_saved = this.event_details.name
      }
    },
    event: {
      deep: true,
      handler(n,o) {
        console.log(n)
        this.event_details.name = n.name
        this.event_details.day = n.day
      }
    }
  },
}
</script>

<style>

</style>