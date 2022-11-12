<template>
  <authentication-card>
    <template #logo>
      <authentication-card-logo />
    </template>
    <template #title>
      {{ $t('auth.register') }}
    </template>

    <form @submit.prevent="submit">
      <v-row>
        <v-col cols="12">
          <v-text-field
            v-model="form.name"
            name="name"
            :label="$t('forms.columns.name')"
            hide-details="auto"
            autocomplete="name"
            :error-messages="errors['name']"
            outlined
            required
            autofocus
          />
        </v-col>
        <v-col cols="12">
          <v-text-field
            v-model="form.email"
            name="email"
            :label="$t('auth.email')"
            type="email"
            hide-details="auto"
            autocomplete="email"
            :error-messages="errors['email']"
            outlined
            required
            autofocus
          />
        </v-col>
        <v-col cols="12">
          <v-text-field
            v-model="form.password"
            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
            :type="show1 ? 'text' : 'password'"
            name="password"
            :label="$t('auth.password')"
            hide-details="auto"
            autocomplete="new-password"
            :error-messages="errors['password']"
            outlined
            required
            autofocus
            @click:append="show1 = !show1"
          />
        </v-col>
        <v-col cols="12">
          <v-text-field
            v-model="form.password_confirmation"
            :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
            name="password"
            :type="show2 ? 'text' : 'password'"
            :label="$t('auth.passwordconfirmation')"
            hide-details="auto"
            autocomplete="new-password"
            outlined
            required
            autofocus
            @click:append="show2 = !show2"
          />
        </v-col>
        <!-- <v-col
          v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature"
          cols="12"
        >
          <v-checkbox
            v-model="form.terms"
            :error-messages="errors['terms']"
          >
            {{ $t('forms.columns.agree') }}<a
              target="_blank"
              :href="route('terms.show')"
              class="v-btn v-btn--text v-size--small"
            >  {{ $t('forms.columns.terms') }}</a>   {{ $t('forms.columns.and') }} <a
              target="_blank"
              :href="route('policy.show')"
              class="v-btn v-btn--text v-size--small"
            >   {{ $t('forms.columns.policy') }}</a>
          </v-checkbox>
        </v-col> -->
        <v-col
          cols="12"
          class="d-flex align-center"
        >
          <v-btn
            color="primary"
            :disabled="form.processing"
            :loading="form.processing"
            @click="submit"
          >
            {{ $t('auth.register') }}
          </v-btn>
          <inertia-link
            :href="route('login')"
            class="v-btn v-btn--text v-size--small"
          >
            {{ $t('auth.alreadyregistered') }}
          </inertia-link>
        </v-col>
      </v-row>
    </form>
  </authentication-card>
</template>

<script>
import AuthenticationCard from '@/components/Auth/AuthenticationCard.vue'
import AuthenticationCardLogo from '@/components/Auth/AuthenticationCardLogo.vue'
import AppLayout from '@/layouts/AppLayout.vue'

export default {
  name: 'RegisterView',

  components: {
    AuthenticationCard,
    AuthenticationCardLogo,
  },

  layout: AppLayout,

  data () {
    return {
      show1: false,
      show2: false,
      form: this.$inertia.form({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        terms: false,
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
      this.form.post(this.route('register'), {
        onFinish: () => this.form.reset('password', 'password_confirmation'),
      })
    },
  },
}
</script>
