<template lang="pug">
  label(:for="name") {{ label }}
    input(
      class="block mt-2 w-full"
      type="text"
      :id="name"
      v-model.lazy.trim="event_name"
      @blur="updateEventName()"
    )
</template>

<script>
export default {
  props: [
    'name',
    'label',
  ],
  data() {
    return {
      event_name: '',
    }
  },
  methods: {
    updateEventName() {
      if (this.event_name) {
        this.$store.dispatch('updateEventName', this.event_name)
      }
    },
  },
}
</script>

<style>

</style>