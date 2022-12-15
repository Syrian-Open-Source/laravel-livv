<template>
  <v-container>
    <v-row>
      <v-col cols="3">
        <h2 class="mt-3 text-decoration-underline">
          {{ $t('home.sos.authors') }}
        </h2>
      </v-col>
      <v-col
        v-for="(author, i) in authors"
        :key="i"
        cols="6"
        md="4"
        sm="3"
      >
        <v-list-item>
          <v-list-item-avatar color="orange darken-4">
            <span class="white--text text-h5">{{ author.avatar }}</span>
          </v-list-item-avatar>

          <v-list-item-content>
            <a :href="author.account">
              <v-list-item-title>{{ author.name }}</v-list-item-title></a>
          </v-list-item-content>
        </v-list-item>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  data: () => ({
    authors: [
      {
        avatar: 'RK',
        name: 'Roduan Kareem Aldeen',
        account: 'https://github.com/RoduanKD',
      },

      {
        avatar: 'FS',
        name: 'Farah Samaha',
        account: 'https://github.com/farahsamaha',
      },
    ],
  }),
}
</script>

<style>
</style>
