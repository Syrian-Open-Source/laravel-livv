<template>
  <authentication-card>
    <template #logo>
      <authentication-card-logo />
    </template>

    <div class="mb-4 text-sm text-gray-600">
      {{ $t("msgs.msg3") }}
    </div>

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
      {{ status }}
    </div>

    <form @submit.prevent="submit">
      <div>
        <v-text-field
          v-model="form.email"
          :label="$t('auth.email')"
          type="email"
          required
          autofocus
          :error-messages="errors['email']"
        />
      </div>

      <div class="flex items-center justify-end mt-4">
        <v-btn :loading="form.processing" color="primary">
          {{ $t("forms.buttons.reset") }}
        </v-btn>
      </div>
    </form>
  </authentication-card>
</template>

<script>
import AuthenticationCard from "@/components/Auth/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/components/Auth/AuthenticationCardLogo.vue";
import AppLayout from "@/layouts/AppLayout.vue";

export default {
  components: {
    AuthenticationCard,
    AuthenticationCardLogo,
  },

  layout: AppLayout,

  props: {
    status: {
      type: String,
      default: "",
    },
  },

  data() {
    return {
      form: this.$inertia.form({
        email: "",
      }),
    };
  },
  computed: {
    errors() {
      return this.$page.props.errors;
    },

    hasErrors() {
      return Object.keys(this.errors).length > 0;
    },
  },
  methods: {
    submit() {
      this.form.post(this.route("password.email"));
    },
  },
};
</script>
