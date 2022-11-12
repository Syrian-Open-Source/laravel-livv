<template>
  <authentication-card>
    <template #logo>
      <authentication-card-logo />
    </template>

    <div class="mb-4 text-sm text-gray-600">
      {{ $t('comps.msg5') }}
    </div>

    <div
      v-if="verificationLinkSent"
      class="mb-4 font-medium text-sm text-green-600"
    >
      {{ $t('comps.msg6') }}
    </div>

    <form @submit.prevent="submit">
      <div class="mt-4 flex items-center justify-between">
        <v-btn :loading="form.processing">
          {{ $t('forms.buttons.resend') }}
        </v-btn>

        <inertia-link
          :href="route('logout')"
          method="post"
          as="button"
          class="underline text-sm text-gray-600 hover:text-gray-900"
        >
          {{ $t('auth.logout') }}
        </inertia-link>
      </div>
    </form>
  </authentication-card>
</template>

<script>
import AuthenticationCard from '@/components/Auth/AuthenticationCard.vue'
import AuthenticationCardLogo from '@/components/Auth/AuthenticationCardLogo.vue'
import AppLayout from '@/layouts/AppLayout.vue'

export default {
  components: {
    AuthenticationCard,
    AuthenticationCardLogo,
  },

  layout: AppLayout,

  props: {
    status: {
      type: String,
      default: '',
    },
  },

  data () {
    return {
      form: this.$inertia.form(),
    }
  },

  computed: {
    verificationLinkSent () {
      return this.status === 'verification-link-sent'
    },
  },

  methods: {
    submit () {
      this.form.post(this.route('verification.send'))
    },
  },
}
</script>
