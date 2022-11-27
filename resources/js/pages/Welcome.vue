<template>
  <div>
    <hero-sec />
    <livv-stack />
    <livv-features />
    <syrian-open-source />
    <v-divider />
    <authors-sec />
  </div>
</template>

<script>
import HeroSec from "@/components/Layout/HeroSec.vue";
import LivvStack from "@/components/Layout/LivvStack.vue";
import LivvFeatures from "@/components/Layout/LivvFeatures.vue";
import SyrianOpenSource from "@/components/Layout/SyrianOpenSource.vue";
import AuthorsSec from "@/components/Layout/AuthorsSec.vue";
import AppLayout from "../layouts/AppLayout.vue";

export default {
  name: "WelcomeView",
  components: {
    HeroSec,
    LivvStack,
    LivvFeatures,
    SyrianOpenSource,
    AuthorsSec,
  },
  layout: AppLayout,
};
</script>
