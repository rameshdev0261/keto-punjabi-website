<template>
    <div>
        <v-app>
            <Navbar />
            <v-main class="front-body">
                <img
                    class="all-recipe-banner"
                    src="https://images.pexels.com/photos/2290744/pexels-photo-2290744.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                    alt=""
                />

                <div class="all-products-section">
                    <div class="text-center">
                        <h1 class="section-heading big-title">
                            Products For <span>You</span>
                        </h1>
                    </div>
                    <br />
                    <v-row class="mt-3">
                        <v-col
                            v-for="(item, i) in products"
                            :key="i"
                            cols="12"
                            sm="6"
                            md="3"
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
        page: 1,
        products: []
    }),
    created(){
         axios
        .get("/api/products")
        .then((response) => {
          this.products = response.data.data;
        })
        .catch((error) => {});
    }
};
</script>

<style></style>
