<template lang="pug">
  .table.w-full.table-event
    div(
      v-for="(datum, i) in data"
      :key="datum+i"
    )
      span(class="inline-block w-3/12") {{ datum.dateno +' '+ datum.dayname }}
      span(class="inline-block w-9/12") Test
</template>

<script>
export default {
  props: ['data'],
  data() {
    return {
    }
  },
  mounted() {
  },
}
</script>

<style>

</style>