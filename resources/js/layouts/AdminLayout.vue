<template>
  <v-app>
    <v-app-bar
      app
      :clipped-left="$page.props.locale !== 'ar'"
      :clipped-right="$page.props.locale === 'ar'"
      color="primary"
      dark
    >
      <v-app-bar-nav-icon @click="drawer = !drawer" />
      <v-app-bar-title>
        <v-img width="75">
          <brand-logo background="primary" />
        </v-img>
      </v-app-bar-title>
      <v-spacer />
      <v-btn
        icon
        @click="switchLang"
      >
        <v-icon>{{ selectableLocale }}</v-icon>
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

    <side-bar :key="route().current()" />

    <!-- Sizes your content based upon application components -->
    <v-main>
      <!-- Provides the application the proper gutter -->
      <flash-messages />
      <transition>
        <slot />
      </transition>
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
import BrandLogo from '@/components/Identity/Logo.vue'
import FlashMessages from '@/components/Layout/FlashMessages.vue'
import SideBar from '@/components/Layout/SideBar.vue'

export default {
  components: {
    FlashMessages,
    BrandLogo,
    SideBar,
  },
  computed: {
    selectableLocale () {
      return this.$page.props.locale === 'en' ? 'mdi-abjad-arabic' : 'mdi-alpha-e'
    },
    selectableLang () {
      return this.$page.props.locale === 'en' ? 'ar' : 'en'
    },
    drawer: {
      get () {
        return this.$store.state.drawer
      },
      set (v) {
        this.$store.commit('SET_DRAWER', v)
      },
    },
  },

  created () {
    this.$i18n.locale = this.$page.props.locale
    this.$vuetify.rtl = this.$page.props.locale === 'ar'
  },
  methods: {
    switchLang () {
      this.$inertia.visit(route('lang.switch', { lang: this.selectableLang }), { preserveScroll: true })
      this.$i18n.locale = this.selectableLang
      this.$vuetify.rtl = this.$i18n.locale === 'ar'
    },
  },
}
</script>
