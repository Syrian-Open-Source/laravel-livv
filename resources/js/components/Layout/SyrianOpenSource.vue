
<template>
  <v-row justify="center" align="center">
    <v-col cols="12" md="6">
      <v-container>
        <h3 class="text-h3 font-weight-medium">
          <span class="primary--text"> {{ $t('home.sos.syrian') }} </span>
          {{ $t('home.sos.title') }}
        </h3>
        <p class="text-h6 font-weight-regular mt-5">
          {{ $t('home.sos.content') }}
        </p>
      </v-container>
    </v-col>
    <v-col cols="5">
      <v-card elevation="3" class="mx-auto my-9" width="344">
        <v-row>
          <v-col cols="12">
            <v-container>
              <v-img
                src="data:image/png;base64,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"
                height="150px"
              />
              <h2 class="font-weight-regular primary--text ml-2 mt-5">
                {{ $t('home.sos.follow') }}
              </h2>
              <p class="mx-3">
                {{ $t('home.sos.subtitle') }}
              </p>
              <v-divider />
              <v-list-item v-for="(item, i) in items" :key="i">
                <v-list-item-icon>
                  <v-icon>{{ item.icon }}</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>{{ item.text }}</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </v-container>
          </v-col>
        </v-row>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
export default {
  data: () => ({
    items: [
      { text: 'http://syrianopensource.com', icon: 'mdi-web' },
      { text: 'Syrian Open Source', icon: 'mdi-facebook' },
      { text: 'Syrian Open Source', icon: 'mdi-github' },
    ],
  }),
};
</script>

<style>
</style>
