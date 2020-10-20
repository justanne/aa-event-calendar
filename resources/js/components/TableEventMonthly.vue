<template lang="pug">
  .table.w-full.table-event
    div(
      v-for="(datum, i) in data"
      :key="datum+i"
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
        this.event_details.name = n.name
      }
    }
  },
}
</script>

<style>

</style>