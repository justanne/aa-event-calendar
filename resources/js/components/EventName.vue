<template lang="pug">
  label(:for="name") {{ label }}
    input(
      class="block mt-2 w-full"
      type="text"
      :id="name"
      :v-model="name"
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
    }
  }
}
</script>

<style>

</style>