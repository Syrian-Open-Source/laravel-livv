<template>
  <v-container>
    <v-card evaluation="4">
      <v-card-text>
        {{ $t('comps.msg1') }}
      </v-card-text>
    </v-card>
  </v-container>
</template>

<script>
import AppLayout from '../layouts/AppLayout.vue'

export default {
  name: 'WelcomeView',
  layout: AppLayout,
}
</script>
