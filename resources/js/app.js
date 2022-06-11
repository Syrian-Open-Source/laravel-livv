import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue'
import { InertiaProgress } from '@inertiajs/progress'
import { Head, Link } from '@inertiajs/inertia-vue'
import vuetify from '@/plugins/vuetify'
import store from './store'
import AdminLayout from '@/Layouts/AdminLayout'

require('./bootstrap')

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel'
InertiaProgress.init({ color: '#4B5563' })

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => {
    const page = require(`./pages/${name}.vue`)
    page.layout = page.layout ||AdminLayout
    return page
  },
  setup ({ el, App, props, plugin }) {
    Vue.use(plugin)

    Vue.mixin({ methods: { route } })

    Vue.component('InertiaHead', Head)
    Vue.component('InertiaLink', Link)

    new Vue({
      render: h => h(App, props),
      vuetify,
      store,
    }).$mount(el)
  },
})

