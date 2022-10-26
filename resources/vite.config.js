import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue2'
import Components from 'unplugin-vue-components/vite'
import { VuetifyResolver } from 'unplugin-vue-components/resolvers'
import eslint from 'vite-plugin-eslint'

export default defineConfig(({ command }) => ({
  resolve: {
    alias: {
      '@': '/resources/js',
      ...(command === 'serve' ? {} : { '@inertiajs/inertia-vue': 'node_modules/@inertiajs/inertia-vue/src/index.js' }),
    },
  },
  css: {
    preprocessorOptions: {
      sass: {
        additionalData: [
          '@import "./resources/styles/styles.scss"',
          '',
        ].join('\n'),
      },
    },
  },
  plugins: [
    laravel([
      'resources/css/app.css',
      'resources/js/app.js',
    ]),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),
    Components({
      resolvers: [VuetifyResolver()],
    }),
    eslint({ fix: true }),
  ],
}))
