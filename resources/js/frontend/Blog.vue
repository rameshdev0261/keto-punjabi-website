<template>
  <div>
    <v-app>
      <Navbar />

      <v-main class="front-body">
        <div class="blog-area">
          <img
            class="blog-cover-img"
            src="https://images.pexels.com/photos/1267320/pexels-photo-1267320.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
            alt=""
          />
          <div class="blog-gradient"></div>

          <div class="all-blogs">
            <v-container>
              <div class="text-center">
                <v-btn elevation="4" large fab>
                  <v-icon>mdi-play</v-icon>
                </v-btn>

                <h1 class="blog-banner-h1">
                  Get The Latest Recipes News & Reviews
                </h1>
              </div>

              <div class="about-channel">
                <v-row>
                  <v-col cols="12" sm="12" md="3">
                    <div class="about-c-avatar">
                      <img
                        src="https://yt3.ggpht.com/ytc/AKedOLQZo9VVXJS8BSeJgtLauz07rtzHhgLYdWXTCueu=s800-c-k-c0x00ffffff-no-rj"
                        alt=""
                      />
                      <h2>Keto Punjabi</h2>
                    </div>
                  </v-col>

                  <v-col class="d-flex align-center" cols="12" sm="12" md="6">
                    <p class="mb-0">
                      KETO PUNJABI provides information about the KETOGENIC DIET
                      to help people LOSE EXCESS WEIGHT.
                    </p>
                  </v-col>

                  <v-col
                    class="text-center text-sm-center text-md-end"
                    cols="12"
                    sm="12"
                    md="3"
                  >
                    <v-btn dark color="#CC0000" depressed>
                      <v-icon left>mdi-youtube</v-icon>
                      Subscribe Now</v-btn
                    >
                  </v-col>
                </v-row>

                <br />
              </div>
            </v-container>
          </div>

          <div class="blog-list-section">
            <v-container>
              <p class="blog-section-title">Most Recent Posts</p>
              <div class="title-divider"></div>
              <br />
              <v-row>
                <v-col
                  v-for="(item, i) in blogs"
                  :key="i"
                  cols="12"
                  sm="6"
                  md="6"
                  lg="4"
                >
                  <div @click="openSheet(item)" class="blog-card">
                    <div class="blog-card-img-wrap">
                      <img :src="item.image" :alt="item.name" />
                      <p class="blog-duration">
                        {{ item.duration }}
                      </p>
                    </div>

                    <h2>{{ item.name }}</h2>

                    <p v-html="item.description" class="blog-desc"></p>

                    <p class="pub-on">
                      {{ item.created_at | moment("dddd, MMMM Do YYYY") }}
                    </p>
                  </div>
                </v-col>
              </v-row>
            </v-container>
          </div>
        </div>

        <v-bottom-sheet
          transition="scroll-y-reverse-transition"
          scrollable
          v-model="sheet"
          inset
          max-height="80%"
          class="blog-d-card"
        >
          <v-card v-if="sheet">
            <v-card-text class="pa-0">
              <iframe
                width="100%"
                height="600"
                :src="video_link"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
              ></iframe>

              <div class="blog-detail">
                <h1>{{title}}</h1>

                <p class="blog-desc">
                 {{description}}
                </p>
              </div>
            </v-card-text>
          </v-card>
        </v-bottom-sheet>
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
    sheet: false,
    video: null,
    title: null,
    description: null,
    duration: null,
    published_on: null,
    blogs: [],
    // blogs: [
    //   {
    //     thumb:
    //       "https://i.pinimg.com/564x/50/b2/2b/50b22bfb2e0b497b3e52714fd38d76c7.jpg",
    //     video: "",
    //     title: "Lemon Garlic Butter Chicken and Green Beans Skillet",
    //     description: "",
    //     duration: "05:00",
    //     published_on: "1 days ago",
    //   },

    //   {
    //     thumb:
    //       "https://i.pinimg.com/564x/e9/33/49/e933495b1f027103278c19e32d35a636.jpg",
    //     video: "",
    //     title: "Juicy and Tender Pork Tenderloin Roast",
    //     description: "",
    //     duration: "08:00",
    //     published_on: "2 days ago",
    //   },
    //   {
    //     thumb:
    //       "https://i.pinimg.com/564x/c1/74/a6/c174a661b02c036768c5df9dca0703a1.jpg",
    //     video: "",
    //     title: "Easy Chicken Madeira Recipe with Secret Sauce",
    //     description: "",
    //     duration: "15:00",
    //     published_on: "2 days ago",
    //   },
    //   {
    //     thumb:
    //       "https://i.pinimg.com/564x/5e/2e/ac/5e2eac32e44737909b68194c6585585b.jpg",
    //     video: "",
    //     title: "Chicken with Spinach in Creamy Parmesan Sauce",
    //     description: "",
    //     duration: "20:00",
    //     published_on: "4 days ago",
    //   },

    //   {
    //     thumb:
    //       "https://i.pinimg.com/564x/b9/70/90/b970909622459af017336f89fed5814e.jpg",
    //     video: "",
    //     title: "Smoked Sausage with Sweet Potato and Fried Onion",
    //     description: "",
    //     duration: "20:00",
    //     published_on: "4 days ago",
    //   },
    // ],
  }),

  created() {
    axios
      .get("/api/blogs")
      .then((response) => {
        this.blogs = response.data.data;
      })
      .catch((error) => {});
  },

  methods: {
    openSheet(item) {
      this.sheet = true;
      this.video_link = item.video_link;
      this.name = item.name;
      this.description = item.description;
      this.duration = "20:00";
      this.created_at = item.created_at;
    },

    close() {},
  },
};
</script>

<style></style>
