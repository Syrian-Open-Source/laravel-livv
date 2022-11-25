<template>
  <inertia-link :href="'/'">
    <v-img
      width="14rem"
      class="mx-auto logo"
      style="backdrop-filter: blur(10px);"
    >
      <brand-logo />
    </v-img>
  </inertia-link>
</template>

<script>
import BrandLogo from '@/components/Identity/Logo.vue'
export default {
  components: {
    BrandLogo,
  },
}
</script>
<style>path{fill:#ffffff;}</style>
