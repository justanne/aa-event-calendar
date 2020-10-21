<template lang="pug">
  label(:for="name") {{ label }}
    input(
      class="block mt-2 w-full"
      type="text"
      :id="name"
      v-model.lazy.trim="event_name"
    )
</template>

<script>
import { mapState } from 'vuex'

export default {
  props: [
    'name',
    'label',
  ],
  data() {
    return {
      event_name: '',
      event_payload: {
        event_type: 'eventname',
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
      if (n) this.updateEventName()
    }
  },
  methods: {
    updateEventName() {
      if (this.event_name) {
        this.event_payload.event_value = this.event_name
        this.$store.dispatch('updateEventDetails', this.event_payload)
      }
    },
  },
}
</script>

<style>

</style>