<template>
  <div>
    <v-app>
      <Navbar />
      <v-main class="front-body">
        <div class="about-area">
          <div class="about-banner">
            <!-- <img :src="'/assets/demo_banner.jpg'" alt="" /> -->
            <img :src="setting.about_image" alt="" />

            <div class="about-title">
              <h1>{{ setting.about_owner_name }}</h1>
              <p class="about-position">Website Owner</p>

              <div class="d-flex align-center">
                <v-icon>mdi-map-marker</v-icon>
                <p v-html="setting.about_address" class="about-address"></p>
              </div>
            </div>
          </div>

          <div class="about-card-parent">
            <div class="about-card2">
              <v-row>
                <v-col cols="12" sm="12" md="12">
                  <h1>
                    KETO PUNJABI provides information about the KETOGENIC DIET
                    to help people LOSE EXCESS WEIGHT.
                  </h1>

                  <p class="about-desc">
                    {{setting.about_content}}

                    <br /><br />
                    KETO PUNJABI is not a doctor, Dietician, or Health
                    specialist. Please follow these diet programs under
                    professional guidance. BEFORE STARTING KETO PROGRAMME PLEASE
                    STUDY the KETOGENIC DIET FULLY.
                  </p>
                </v-col>
              </v-row>

              <v-row justify="center">
                <v-col cols="12" sm="12" md="12">
                  <div class="text-center mb-4">
                    <h1 class="section-heading">
                      <span>Youtube</span> Channel
                    </h1>
                  </div>
                </v-col>
                <v-col cols="12" sm="12" md="12" lg="8">
                  <div class="grey-border overflow-hidden">
                    <v-row>
                      <v-col class="pa-0" cols="12" sm="4" md="4">
                        <div class="youtube-stats bg-grey">
                          <h1>{{ channelInfo.subscriberCount }}</h1>

                          <p>Subscribers</p>
                        </div>
                      </v-col>
                      <v-col class="pa-0" cols="12" sm="4" md="4">
                        <div class="youtube-stats">
                          <h1>{{ channelInfo.videoCount }}</h1>

                          <p>Recipes Videos</p>
                        </div>
                      </v-col>
                      <v-col class="pa-0" cols="12" sm="4" md="4">
                        <div class="youtube-stats bg-grey">
                          <h1>{{ channelInfo.viewCount }}</h1>

                          <p>Videos Views</p>
                        </div>
                      </v-col>
                    </v-row>
                  </div>
                </v-col>
              </v-row>

              <div class="subscribe-channel-card">
                <h1>
                  Please Subscribe My Youtube Channel <br />
                  to watch recipes videos daily
                </h1>
                <v-btn
                  href="https://www.youtube.com/channel/UC6TF3Az8qnVIUzlOiPHBjEg"
                  target="_blank"
                  x-large
                  depressed
                  color="darkText"
                  dark
                  >Subscribe Now</v-btn
                >
              </div>
            </div>
          </div>
        </div>
      </v-main>
      <Footer />
    </v-app>
  </div>
</template>

<script>
import Navbar from "./common/Navbar.vue";
import Footer from "./common/Footer.vue";
import axios from "axios";

export default {
  components: {
    Navbar,
    Footer,
  },
  data: () => ({
    setting: {},
    channelInfo: {
      subscriberCount: 0,
      videoCount: 0,
      viewCount: 0,
    },
  }),

  created() {
    axios
      .get("/api/settings")
      .then((response) => {
        this.setting = response.data.data;
      })
      .catch((error) => {});

    this.getChannelData();
  },

  methods: {
    getChannelData() {
      axios
        .get("/api/get_channel_info")
        .then((response) => {
          this.channelInfo = response.data.data;
        })
        .catch((error) => {});
    },
  },
};
</script>

<style></style>
