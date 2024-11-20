<template>
    <div>
        <v-app>
            <Navbar />
            <v-main class="front-body">
                <div class="single-recipe-section">
                    <v-row>
                        <v-col cols="12" sm="12" md="12" lg="6">
                            <img
                                v-if="recipe.thumbnail"
                                class="dish-img"
                                :src="recipe.thumbnail"
                                alt=""
                            />
                              <iframe
                              v-else
                                class="dish-img"
                                :src="recipe.video_link"
                                title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                            ></iframe>

                        </v-col>
                        <v-col cols="12" sm="12" md="12" lg="6">
                            <h1>{{recipe.title}}</h1>
                            <v-btn
                                v-if="recipe.thumbnail"
                                x-large
                                depressed
                                dark
                                rounded
                                outlined
                                color="black"
                                @click="video_dialog = true"
                                class="my-4"
                            >
                                <v-icon left size="28" class="mr-3"
                                    >mdi-play-circle</v-icon
                                >
                                Watch Video</v-btn
                            >
                            <div class="social-btn mt-4">
                                <a> <img :src="recipe.diet_type=='Vegetarian'?'/assets/veg.svg':'/assets/non-veg.svg'" alt=""> {{recipe.diet_type}}</a>
                                <a v-if="social_obj.instagram_link" :href="social_obj.instagram_link"><v-icon>mdi-instagram</v-icon></a>
                                <a v-if="social_obj.facebook_link" :href="social_obj.facebook_link"><v-icon>mdi-facebook</v-icon></a>
                                <a v-if="social_obj.twitter_link" :href="social_obj.twitter_link"><v-icon>mdi-twitter</v-icon></a>
                                <a v-if="social_obj.youtube_link" :href="social_obj.youtube_link"><v-icon>mdi-youtube</v-icon></a>
                                <a v-if="social_obj.pinterest_link" :href="social_obj.pinterest_link"><v-icon>mdi-pinterest</v-icon></a>
                            </div>

                            <div class="recipe-duration social-btn mt-5 mb-5">
                                <a
                                v-if="recipe.prep_time"
                                 href="#"
                                    ><v-icon class="mr-2">mdi-clock</v-icon> {{recipe.prep_time}}
                                    Minutes</a
                                >
                                <a v-if="recipe.meal" href="#"
                                    ><v-icon class="mr-2"
                                        >mdi-food-fork-drink</v-icon
                                    >
                                    {{recipe.meal}}</a
                                >
                                <a v-if="recipe.difficulty" href="#"
                                    ><v-icon class="mr-2">mdi-thumb-up</v-icon>
                                    {{recipe.difficulty}}</a
                                >
                                <a v-if="recipe.category" href="#"
                                    ><v-icon class="mr-2">mdi-star</v-icon>
                                    {{recipe.category}}</a
                                >
                            </div>

                            <p v-if="recipe.nutritions.length" class="recipe-section-p">Nutritions per serve</p>
                            <div class="nutritions">
                                <div
                                    v-for="(item, i) in recipe.nutritions"
                                    :key="i"
                                    class="nutritions-card"
                                >
                                    <div class="number-of-nut">
                                        <p>{{ item.value }}</p>
                                    </div>

                                    <p class="nut-name">{{ item.title }}</p>
                                </div>
                            </div>
                        </v-col>
                    </v-row>
                    <h4 class="mt-8 recipe-desc-bold">
                        {{recipe.short_description}}
                    </h4>


                    <v-row>
                        <v-col cols="12" sm="12" md="12" lg="4">
                            <div class="white-card">
                                <h3 v-if="recipe.ingredients.length" class="mb-4">Used Ingredients</h3>

                                <div v-for="(item) in recipe.ingredients" :key="item.id" class="ingredients">
                                    <h4>{{item.ingredient}}</h4>
                                    <p>{{item.quantity}}</p>
                                </div>

                            </div>
                        </v-col>
                        <v-col cols="12" sm="12" md="12" lg="8">
                            <div class="white-card">
                                <h3 class="mb-4">Instructions</h3>
                                <div
                                    v-for="(item) in recipe.directions"
                                    :key="item.id"
                                    class="inst-line"
                                >
                                    <div>
                                        <h4 class="inst-number">{{ item.step }}</h4>
                                    </div>
                                    <p class="recipe-section-p">
                                        {{ item.description }}
                                    </p>
                                </div>
                                <div
                                    class="inst-line"
                                >
                                 <p class="recipe-section-p">
                                        Please watch video for recipe directions.
                                    </p></div>
                            </div>
                        </v-col>
                    </v-row>
                    <h3 class="my-8">Products</h3>
                    <v-row>
                        <v-col
                            v-for="(item, i) in products"
                            :key="i"
                            cols="12"
                            sm="6"
                            md="4"
                            lg="3"
                        >
                            <a :href="item.link" target="_blank">
                                <div class="product-wrapper">
                                    <div class="product-con">
                                        <div class="top">
                                            <img
                                                :src="item.image"
                                                :alt="item.title"
                                            />
                                            <v-icon>mdi-open-in-new</v-icon>
                                        </div>
                                        <div class="bottom">
                                            <div class="details">
                                                <h2>{{ item.title }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </v-col>
                    </v-row>
                </div>

                <v-dialog v-model="video_dialog" max-width="660">
                    <v-card class="video-card" v-if="video_dialog">
                        <v-card-text class="pa-0">
                            <iframe
                                width="660"
                                height="415"
                                :src="recipe.video_link"
                                title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                            ></iframe
                        ></v-card-text>
                    </v-card>
                </v-dialog>
            </v-main>
            <Footer @socialData="socialData"/>
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
    props:['recipe','products'],
    methods:{
         socialData(value){
            this.social_obj = value;
        }
    },
    data: () => ({
        video_dialog: false,
        social_obj: {
          facebook_link: "",
          instagram_link: "",
          twitter_link: "",
          youtube_link: "",
          pinterest_link: "",
    },
    }),
};
</script>

<style></style>
