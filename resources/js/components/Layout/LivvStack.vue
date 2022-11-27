<template>
  <v-container>
    <v-row align-content="center">
      <v-col cols="12">
        <div class="text-h2 text-center my-6 primary--text">
          {{ $t("home.title.title1") }}
        </div>
        <v-row class="my-6" align-content="center" justify="center">
          <v-col
            v-for="(Tool, i) in tools"
            :key="i"
            align-self="center"
            cols="3"
          >
            <v-hover>
              <template #default="{ hover }">
                <v-container>
                  <v-img
                    contain
                    :class="{ scale: hover }"
                    :src="Tool.src"
                    height="120"
                    class="ma-5"
                  />

                  <v-card-title class="d-flex justify-center align-center">
                    {{ Tool.title }}
                  </v-card-title>
                </v-container>
              </template>
            </v-hover>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  data: () => ({
    tools: [
      {
        src: "https://cdn.cdnlogo.com/logos/l/23/laravel.svg",
        title: "Laravel",
      },

      {
        src: "https://external-preview.redd.it/rMqAJJoGbhRYlW4XdUCaRYCAMbGQD-C1d7yMoMjMs18.jpg?auto=webp&s=74dc28614c1c45a9e8b5d43f63f7080f7decac64",
        title: "Inertia",
      },

      {
        src: "https://cdn.cdnlogo.com/logos/v/92/vue-js.svg",
        title: "Vue2",
      },
      {
        src: "https://cdn.cdnlogo.com/logos/v/50/vuetify.svg",
        title: "Vuetify",
      },
    ],
  }),
};
</script>

<style>
.scale .v-image__image {
  transform: scale(1.1);
  transition: transform 1s;
}
</style>
