<template>
  <v-app>
    <v-app-bar
      app
      color="primary"
      dark
    >
      <v-container>
        <v-toolbar-title>{{ $page.props.app.name }}</v-toolbar-title>
        <v-spacer />
      </v-container>
      <v-btn
        class="d-flex justify-center justify-space-around mr-3 "
        large
        text
        height="35"
        :href="route('login')"
      >
        {{ $t('auth.login') }}
      </v-btn>
      <v-btn
        class="d-flex justify-center justify-space-around mr-3 "
        large
        text
        height="35"
        :href="route('register')"
      >
        {{ $t('auth.register') }}
      </v-btn>
      <v-btn
        icon
        @click="$vuetify.theme.dark = !$vuetify.theme.dark"
      >
        <v-icon v-if="!$vuetify.theme.dark">
          mdi-weather-night
        </v-icon>
        <v-icon v-else>
          mdi-white-balance-sunny
        </v-icon>
      </v-btn>
    </v-app-bar>

    <!-- Sizes your content based upon application components -->
    <v-main>
      <!-- Provides the application the proper gutter -->
      <slot />
    </v-main>

    <v-footer
      app
      small
    >
      &copy; {{ new Date().getFullYear() }} {{ $page.props.app.name }}
    </v-footer>
  </v-app>
</template>

<script>
export default {

  data () {
    return {
      showingNavigationDropdown: false,
    }
  },

  methods: {
    logout () {
      this.$inertia.post(route('logout'))
    },
  },
}
</script>
