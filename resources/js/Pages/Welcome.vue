<template>
  <layout>
    <div class="container-fluid py-2">
      <div class="row">
        <div class="col-12">
          {{ user }}
        </div>
      </div>
    </div>
  </layout>
</template>

<script>
  import Layout from "../Shared/Layout.vue"

  export default {
    components: {Layout},
    props: ['foo', 'user']
  }
</script>

<style>
  #user_avatar {
    width: 30px;
    border-radius: 50%;
    margin-right: 3px;
  }
</style>
