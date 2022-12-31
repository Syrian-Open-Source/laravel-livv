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
      <template v-if="!$page.props.auth.user">
        <v-btn
          large
          text
          :href="route('login')"
          @click.prevent="$inertia.visit(route('login'))"
        >
          {{ $t('auth.login') }}
        </v-btn>
        <v-btn
          large
          text
          :href="route('register')"
          @click.prevent="$inertia.visit(route('register'))"
        >
          {{ $t('auth.register') }}
        </v-btn>
      </template>
      <v-btn
        v-else
        large
        text
        :href="route('admin.dashboard')"
        @click.prevent="$inertia.visit(route('admin.dashboard'))"
      >
        {{ $t('nav.general.dashboard') }}
      </v-btn>      <v-btn
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
