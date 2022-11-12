<template>
  <authentication-card>
    <template #logo>
      <authentication-card-logo />
    </template>

    <div class="mb-4 text-subtitle-2">
      {{ $t('comps.msg3') }}
    </div>

    <form @submit.prevent="submit">
      <v-row>
        <v-col cols="12">
          <v-text-field
            v-model="form.password"
            name="password"
            type="password"
            :label="$t('auth.password')"
            hide-details="auto"
            autocomplete="current-password"
            :error-messages="errors['password']"
            outlined
            required
            autofocus
          />
        </v-col>
      </v-row>
      <v-col
        cols="12"
        class="d-flex align-center justify-end"
      >
        <v-btn
          color="primary"
          :disabled="form.processing"
          :loading="form.processing"
          @click="submit"
        >
          {{ $t('forms.buttoms.confirm') }}
        </v-btn>
      </v-col>
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

  data () {
    return {
      form: this.$inertia.form({
        password: '',
      }),
    }
  },

  computed: {
    errors () {
      return this.$page.props.errors
    },

    hasErrors () {
      return Object.keys(this.errors).length > 0
    },
  },

  methods: {
    submit () {
      this.form.post(this.route('password.confirm'), {
        onFinish: () => this.form.reset(),
      })
    },
  },
}
</script>
