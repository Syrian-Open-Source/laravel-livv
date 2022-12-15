<template>
  <v-img
    height="300"
    src="https://images.unsplash.com/photo-1589674461706-98ebc804175c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
  >
    <v-overlay absolute opacity="0.4" color="#153462">
      <v-row align="center" class="fill-height" align-content="center">
        <v-col cols="12" sm="6">
          <p class="text-h4 white--text font-weight-medium mr-10">
            {{ $t('home.title.title2') }}
          </p>
        </v-col>
        <v-col cols="12" sm="6">
          <v-container class="ml-12">
            <ul class="text-h6">
              <li>{{ $t('home.features.f1') }}</li>
              <li>{{ $t('home.features.f2') }}</li>
              <li>{{ $t('home.features.f3') }}</li>
              <li>{{ $t('home.features.f4') }}</li>
              <li>{{ $t('home.features.f5') }}</li>
            </ul>
          </v-container>
        </v-col>
      </v-row>
    </v-overlay>
  </v-img>
</template>
