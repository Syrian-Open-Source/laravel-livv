<template>
  <div>
    <hero-section />
    <livv-stack />
    <livv-features />
    <syrian-open-source />
    <v-divider />
    <authors-section />
  </div>
</template>

<script>
import HeroSection from '@/components/Layout/HeroSection.vue'
import LivvStack from '@/components/Layout/LivvStack.vue'
import LivvFeatures from '@/components/Layout/LivvFeatures.vue'
import SyrianOpenSource from '@/components/Layout/SyrianOpenSource.vue'
import AuthorsSection from '@/components/Layout/AuthorsSection.vue'
import AppLayout from '@/layouts/AppLayout.vue'

export default {
  name: 'WelcomeView',

  components: {
    HeroSection,
    LivvStack,
    LivvFeatures,
    SyrianOpenSource,
    AuthorsSection,
  },

  layout: AppLayout,
};
</script>
