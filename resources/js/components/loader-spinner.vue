<template>
  <div class="loader-spinner position-absolute">
    <b-spinner variant="primary" />
  </div>
</template>

<script>
    export default {
        name: "loader-spinner"
    }
</script>

<style lang="scss">
.loader-spinner{
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: #fff8;
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
