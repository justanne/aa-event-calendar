<template lang="pug">
  label(:for="name") {{ label }}
    input(
      class="mt-2"
      type="date"
      :min="min"
      :max="max"
      :id="name"
    )
</template>

<script>
export default {
  props: [
    'name',
    'label',
    'min',
    'max',
  ],
}
</script>

<style>

</style>