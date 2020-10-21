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
        v-model="checked_value[checkname]"
      )
      | {{ checkname }}
</template>

<script>
export default {
  props: {
    checkboxes: Array,
    name: String,
  },
  data() {
    return {
      checked_name: '',
      checked_value: [],
    }
  },
  watch: {
    checked_value: {
      deep: true,
      handler: function(n,o) {
        console.log(n.value)
      }
    },
  }
}
</script>

<style>

</style>