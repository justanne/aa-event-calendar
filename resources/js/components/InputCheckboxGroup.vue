<template lang="pug">
  .flex.flex-wrap.mt-6.inp-checkgroup
    label(
      v-for="(checkname, i) in checkboxes"
      :for="name+'-'+checkname.toLowerCase()"
      :key="checkname.toLowerCase()+i"
    )
      input(
        type="checkbox"
        :id="name+'-'+checkname.toLowerCase()"
        @click.stop="updateCheckedValues(checkname.toLowerCase(), $event)"
      )
      | {{ checkname }}
</template>

<script>
import { mapState } from 'vuex'

export default {
  props: {
    checkboxes: Array,
    name: String,
  },
  data() {
    return {
      checked_values: [],
      event_payload: {
        event_type: 'eventday',
        event_value: ''
      },
    }
  },
  computed: {
    ...mapState([
      'save'
    ])
  },
  watch: {
    save: function(n,o) {
      return (n) ? this.$store.dispatch('updateEventDetails', this.event_payload) : false
    }
  },
  methods: {
    updateCheckedValues(value, event) {
      (event.target.checked) ? this.checked_values.push(value) : this.removeUnchecked(value)
      this.updateEventPayload()
    },
    removeUnchecked(value) {
      this.checked_values.forEach(v => {
        if (v === value) {
          let index = this.checked_values.indexOf(value)
          this.checked_values.splice(index, 1)
          return false
        }
      })
      this.updateEventPayload()
    },
    updateEventPayload() {
      this.event_payload.event_value = this.checked_values
      console.log(this.event_payload)
    },
  },
}
</script>

<style>

</style>