<template>
  <div class="footer-section">
    <div class="footer-card">
      <v-row>
        <v-col cols="12" sm="12" md="6">
          <h1 class="footer-title">Stay Connect<br />With Us.</h1>
          <p class="footer-desc">
            Get latest keto recipe videos and more! <br />
            Subscribe to our YouTube channel.
          </p>
          <br />
          
          <v-btn
            @click="openYoutube"
            x-large 
            color="primary"
            depressed
            >Subscribe Now</v-btn
          >
           
        </v-col>
        <v-col cols="12" sm="12" md="6">
          <v-row>
            <v-col cols="12" sm="6" md="6">
              <h3>Links</h3>
              <div class="footer-content">
                <div class="mb-2">
                  <a href="/">Home</a>
                </div>
                <div class="mb-2">
                  <a href="/all-products">Products</a>
                </div>
                <div class="mb-2">
                  <a href="/all-recipes">Recipes</a>
                </div>
                <div class="mb-2">
                  <a href="/about">About Us</a>
                </div>
                <div class="mb-2">
                  <a href="/contact-us">Contact Us</a>
                </div>
                <div class="mb-2">
                  <a href="/blog">Blog</a>
                </div>
              </div>
            </v-col>

            <v-col cols="12" sm="6" md="6">
              <h3>Legal Information</h3>
              <div class="footer-content">
                <div class="mb-2">
                  <a href="/terms-conditions">Terms & Conditions</a>
                </div>
                <div class="mb-2">
                  <a href="/privacy-policy">Privacy Policy</a>
                </div>
              </div>
            </v-col>
            <v-col cols="12" sm="12" md="12">
              <h3>Follow Us</h3>
              <div class="footer-social mt-4">
                <a
                  v-if="social_obj.facebook_link"
                  target="_blank"
                  :href="social_obj.facebook_link"
                  ><v-icon>mdi-facebook</v-icon></a
                >
                <a
                  v-if="social_obj.instagram_link"
                  target="_blank"
                  :href="social_obj.instagram_link"
                  ><v-icon>mdi-instagram</v-icon></a
                >
                <a
                  v-if="social_obj.twitter_link"
                  :href="social_obj.twitter_link"
                  ><v-icon>mdi-twitter</v-icon></a
                >
                <a
                  v-if="social_obj.youtube_link"
                  :href="social_obj.youtube_link"
                  ><v-icon>mdi-youtube</v-icon></a
                >
                <a
                  v-if="social_obj.pinterest_link"
                  :href="social_obj.pinterest_link"
                  ><v-icon>mdi-pinterest</v-icon></a
                >
              </div>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data: () => ({
    social_obj: {
      facebook_link: "",
      instagram_link: "",
      twitter_link: "",
      youtube_link: "",
      pinterest_link: "",
    },
  }),
  created() {
    axios.get("/api/get_social_links").then((r) => {
      this.social_obj.facebook_link = r.data.data.facebook_link;
      this.social_obj.instagram_link = r.data.data.instagram_link;
      this.social_obj.twitter_link = r.data.data.twitter_link;
      this.social_obj.youtube_link = r.data.data.youtube_link;
      this.social_obj.pinterest_link = r.data.data.pinterest_link;
      this.$emit("socialData", this.social_obj);
    });
  },
  methods: {
    openYoutube() {
      window.open(
        "https://www.youtube.com/channel/UC6TF3Az8qnVIUzlOiPHBjEg",
        "_blank"
      );
    },
  },
};
</script>

<style></style>
