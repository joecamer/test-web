<template>
  <layout>
    <div class="p-3">
      <h3>On a recu : {{ foo }}</h3>
    </div>
  </layout>
</template>

<script>
  import Layout from "../Shared/Layout.vue"
  export default {
    components: {Layout},
    props: ['foo']
  }
</script>
