<template lang="pug">
  label(:for="name") {{ label }}
    input(
      class="mt-2"
      type="date"
      :min="min"
      :max="max"
      :id="name"
      v-model="event_inputdate"
      @change="updateDateValues()"
    )
</template>

<script>
import { mapState } from 'vuex'

export default {
  props: [
    'name',
    'label',
    'min',
    'max',
  ],
  data() {
    return {
      event_inputdate: '',
      event_payload: {
        event_type: '',
        event_value: ''
      },
    }
  },
  computed: {
    ...mapState([
      'save'
    ])
  },
  mounted() {
    if (this.name === 'ev-from')    { this.event_payload.event_type = 'eventfrom' }
    else if (this.name === 'ev-to') { this.event_payload.event_type = 'eventto' }
  },
  watch: {
    save: function(n,o) {
      return (n) ? this.$store.dispatch('updateEventDetails', this.event_payload) : false
    }
  },
  methods: {
    updateDateValues() {
      if (this.event_inputdate) { this.event_payload.event_value = this.event_inputdate }
    }
  },
}
</script>

<style>

</style>