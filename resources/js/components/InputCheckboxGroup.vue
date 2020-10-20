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