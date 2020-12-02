<template>
  <inertia-link :href="to">
    <img :src="`storage/left-menu/${icon}`" alt="" style="width: 80px">
    <p class="p-0">{{ label }}</p>
  </inertia-link>
</template>

<script>
  export default {
    name: "left-menu-item",
    props: {
      to: String,
      icon: String,
      label: {String, required: true}
    }
  }
</script>
