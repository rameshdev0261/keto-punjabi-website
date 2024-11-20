<template>
    <div class="banner-section">
        <div class="banner-container">
            <v-carousel
                cycle
                class="banner-height"
                hide-delimiter-background
                :show-arrows="false"
            >
                <v-carousel-item
                    transition="scroll-x-reverse-transition"
                    v-for="(slide, i) in slidesList"
                    :key="i"
                >
                    <v-row class="mb-0">
                        <v-col
                            class="banner-detail pb-0"
                            cols="12"
                            sm="12"
                            md="3"
                        >
                            <div class="banner-card">
                                <h1>{{ slide.title }}</h1>
                                <p>
                                    {{ slide.content }}
                                </p>

                                <v-btn
                                    href="/all-recipes"
                                    class="mr-5"
                                    :x-large="$vuetify.breakpoint.mdAndUp"
                                    :large="$vuetify.breakpoint.smAndDown"
                                    depressed
                                    dark
                                    color="primary"
                                    >Explore Menu</v-btn
                                ><v-btn
                                    :x-large="$vuetify.breakpoint.mdAndUp"
                                    :large="$vuetify.breakpoint.smAndDown"
                                    depressed
                                    dark
                                    rounded
                                    outlined
                                    color="black"
                                    @click="openVideo(slide)"
                                >
                                    <v-icon left size="28" class="mr-3"
                                        >mdi-play-circle</v-icon
                                    >
                                    Watch Video</v-btn
                                >
                            </div>
                        </v-col>
                        <v-col class="banner-img pb-0" cols="12" sm="12" md="9">
                            <img :src="slide.image" alt="" />

                            <div class="go-to-down">
                                <v-icon size="50" color="primary"
                                    >mdi-arrow-down</v-icon
                                >
                            </div>
                        </v-col>
                    </v-row>
                </v-carousel-item>
            </v-carousel>
        </div>
        <img class="banner-grid" :src="'/assets/grid.png'" alt="" />

        <v-dialog v-model="video_dialog" max-width="660">
            <v-card class="video-card">
                <v-card-text class="pa-0"
                    ><iframe
                        width="660"
                        height="415"
                        :src="video_link"
                        title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe
                ></v-card-text>
            </v-card>
        </v-dialog>
        <!-- </div> -->
        <!-- <img class="banner-grid" :src="'/assets/grid.png'" alt="" /> -->
        <!--
    <v-dialog v-model="video_dialog" max-width="660">
      <v-card v-if="video_dialog" class="video-card">
        <v-card-text class="pa-0"
          ><iframe
            width="660"
            height="415"
            :src="videoLink"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe
        ></v-card-text>
      </v-card>
    </v-dialog> -->
    </div>
</template>

<script>
import axios from "axios";
export default {
    props: ["bannerImage", "videoLink"],

    data: () => ({
        video_dialog: false,
        video_link: "",
        slides: ["First", "Second", "Third", "Fourth", "Fifth"],
        slidesList: [
            {
                title: "We've got something for everyone",
                content:
                    "Always take care of your health starting from the load menu that you consume every day",
                image: "https://images.pexels.com/photos/5463890/pexels-photo-5463890.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260",
            },
        ],
    }),
    methods: {
        openVideo(slide) {
            this.video_link = slide.video_link;
            this.video_dialog = true;
        },
    },

    created() {
        axios.get("/api/sliders").then((res) => {
            if (res.data.data) {
                this.slidesList = res.data.data;
            }
        });
    },
};
</script>

<style></style>
