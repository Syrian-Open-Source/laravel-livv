import Vue from 'vue'
import { createInertiaApp, Link } from '@inertiajs/inertia-vue'
import { InertiaProgress } from '@inertiajs/progress'
import vuetify from '@/plugins/vuetify'
import AdminLayout from '@/layouts/AdminLayout.vue'
import store from './store'
import i18n from '@/i18n/i18n'
import '@/plugins/helpers'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'

import './bootstrap'

Vue.mixin({ methods: { route } })

InertiaProgress.init({
  showSpinner: false,
  color: '#f88e2d',
})

Vue.component('InertiaLink', Link)

createInertiaApp({
  resolve: name => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')).then(({ default: page }) => {
    page.layout = page.layout === undefined ? AdminLayout : page.layout
    return page
  }),
  setup ({
    el,
    App,
    props,
    plugin,
  }) {
    Vue.use(plugin)

    new Vue({
      vuetify,
      store,
      i18n,
      render: h => h(App, props),
    }).$mount(el)
  },
})
