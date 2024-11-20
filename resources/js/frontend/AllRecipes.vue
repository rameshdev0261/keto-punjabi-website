<template>
  <div>
    <v-app>
      <Navbar />
      <v-main class="front-body">
        <img
          class="all-recipe-banner"
          src="https://images.pexels.com/photos/8525158/pexels-photo-8525158.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
          alt=""
        />
        <div class="all-recipe-section">
          <div class="text-center">
            <h1 class="section-heading big-title">
              My All <span>Recipes.</span>
            </h1>
          </div>
          <br />
          <br />
          <v-row>
            <v-col cols="12" sm="12" md="12" lg="3">
              <Filters @childToParent="childToParent" />
            </v-col>
            <v-col cols="12" sm="12" md="12" lg="9">
              <v-row>
                <v-col cols="12" sm="7" md="7">
                  <!-- <div class="show-field">
                    <p>Show:</p>
                    <v-select
                      v-model="showModel"
                      :items="show"
                      outlined
                      hide-details=""
                    ></v-select>
                  </div> -->
                </v-col>

                <v-col cols="12" sm="5" md="5">
                  <v-text-field
                    outlined
                    v-model="search_text"
                    prepend-inner-icon="mdi-magnify"
                    placeholder="Search recipes.."
                    hide-details=""
                  ></v-text-field>
                </v-col>
                <v-col
                  v-for="(item, i) in latestRecipes"
                  :key="i"
                  cols="12"
                  sm="6"
                  md="4"
                  lg="6"
                >
                  <div class="res-card">
                    <figure class="res-card__thumb">
                      <img :src="item.thumbnail" class="res-card__image" />
                      <figcaption class="res-card__caption">
                        <div class="res-card-t-con">
                          <h2 class="res-card__title">
                            {{ item.title }}
                          </h2>
                        </div>
                        <a :href="'/recipe/' + item.id" class="res-card__button"
                          >Read more</a
                        >
                      </figcaption>
                    </figure>
                  </div>
                </v-col>
              </v-row>
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
import Filters from "./common/RecipeFilter.vue";
import axios from "axios";

export default {
  components: {
    Navbar,
    Footer,
    Filters,
  },
  data: () => ({
    veg: false,
    non_veg: false,
    timer: null,
    showModel: "12",
    search_text: "",
    // show: ["12", "24", "36"],
    latestRecipes: [
      {
        id: 1,
        thumbnail:
          "https://images-prod.healthline.com/hlcmsresource/images/Best-of-Books/3275-keto_tacos_1296x728-body1.jpg",
        title: "Low Carb Taco Night with Cheese Taco Shells",
      },
    ],
  }),

  created() {
    const params = new URLSearchParams(location.search);
    console.log(params);
    if (params.has("category")) {
      this.serachRecipe(params.get("category"));
    } else this.getAllRecipes();
  },

  watch: {
    search_text() {
      clearTimeout(this.timer);
      this.timer = setTimeout(() => {
        this.serachRecipe();
      }, 500);
    },
  },

  methods: {
    getAllRecipes() {
      axios
        .get("/api/recipes")
        .then((response) => {
          if (response.data.data) {
            this.latestRecipes = response.data.data;
          }
        })
        .catch((e) => {});
    },

    childToParent(item) {
      this.veg = item.veg;
      this.non_veg = item.non_veg;
      if (item.model) {
        this.serachRecipe(item.value);
      } else {
        this.serachRecipe(null);
      }
    },

    serachRecipe(categoryId = null) {
      var obj = {
        search_text: this.search_text,
      };
      if (categoryId) {
        obj.category_id = categoryId;
      }

      if (this.veg && !this.non_veg) {
        obj.diet_types = "Vegetarian";
      } else if (this.non_veg && !this.veg) {
        obj.diet_types = "Non-vegetarian";
      }
      
      axios
        .post("/api/search_recipes", obj)
        .then((response) => {
          if (response.data.data) {
            this.latestRecipes = response.data.data;
          }
        })
        .catch((e) => {});
    },
  },
};
</script>

<style></style>
