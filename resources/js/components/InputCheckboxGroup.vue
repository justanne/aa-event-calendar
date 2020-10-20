<template lang="pug">
  .flex.flex-wrap.mt-6.inp-checkgroup
    label(
      v-for="checkname in checkboxes"
      :for="name+'-'+checkname.toLowerCase()"
    )
      input(
        type="checkbox"
        :id="name+'-'+checkname.toLowerCase()"
      )
      | {{ checkname }}
</template>

<script>
export default {
  props: {
    checkboxes: Array,
    name: String,
  },
}
</script>

<style>

</style>