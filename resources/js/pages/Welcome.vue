<template>
  <v-container>
    <v-card elevation="5">
      <v-card-text>
        {{ $t('msgs.msg1') }}
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
