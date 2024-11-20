<template>
  <div class="about-section">
    <div class="about-card">
      <v-row class="pa-0 ma-0">
        <v-col class="pa-0" cols="12" sm="6" md="6">
          <div class="about-section-detail">
            <h1>{{ ownerBox.home_info_title }}</h1>
            <p class="desc">
              {{ ownerBox.home_info_about }}
            </p>

            <v-row>
              <v-col cols="12" sm="12" md="6">
                <h2>{{ ownerBox.about_owner_name }}</h2>
                <p class="ma-0" style="color: white">Website Owner</p>
              </v-col>

              <v-col class="text-end" cols="12" sm="12" md="6">
                <img class="sign" :src="'/assets/demo_sign.svg'" alt="" />
              </v-col>
            </v-row>

            <v-btn
              class="mt-4"
              href="/all-products"
              depressed
              color="primary"
              outlined
              >View More</v-btn
            >
          </div>
        </v-col>
        <v-col class="pa-0" cols="12" sm="6" md="6">
          <img class="owner-photo" :src="ownerBox.home_info_image" alt="" />
        </v-col>
      </v-row>
    </div>
  </div>
</template>

<script>
export default {
  props: ["ownerBox"],
};
</script>

<style></style>
