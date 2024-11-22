<template>
  <div class="latest-recipes-section">
    <v-row>
      <v-col cols="12" sm="6" md="6">
        <p class="c-primary section-mini-title">Recipes</p>
        <h1 class="section-heading">250+ Healthy <span>Keto Recipes.</span></h1>
        <p>
          {{ description }}
        </p>
        <v-btn @click="dialog = true" color="primary" text
          >Filter Recipes</v-btn
        >
        <!-- Applied Categories Chips -->
        <div class="mt-3">
          <v-chip
            v-if="allCategoriesSelected"
            color="primary"
            dark
            class="mr-2"
          >
            All
          </v-chip>
          <v-chip
            v-for="category in selectedCategories"
            :key="category.value"
            color="primary"
            dark
            class="mr-2"
            v-else
          >
            {{ category.text }}
          </v-chip>
        </div>
      </v-col>
      <v-col class="d-flex justify-end" cols="12" sm="6" md="6">
        <lottie-player
          class="recipe-lottie"
          :src="'/assets/animations/arrow_anim.json'"
          background="transparent"
          speed="1"
          loop
          autoplay
        ></lottie-player>
      </v-col>
    </v-row>

    <v-row>
      <template v-if="Recipes.length > 0">
        <v-col
          v-for="(item, i) in Recipes.length > 7
            ? Recipes.slice(0, 7)
            : Recipes"
          :key="i"
          cols="12"
          sm="6"
          md="4"
          lg="3"
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

        <v-col v-if="Recipes.length > 7" cols="12" sm="4" md="3">
          <a href="/all-recipes">
            <div class="view-more-card">
              <v-icon>mdi-arrow-right-circle</v-icon>
              <p class="mb-0">View More..</p>
            </div></a
          >
        </v-col>
      </template>
      <template v-else>
        <!-- No Data Found Message -->
        <v-col cols="12" class="text-center">
          <p class="no-data-message">
            No recipes found. Please try another filter.
          </p>
        </v-col>
      </template>
    </v-row>
    <!-- Filter Dialog -->
    <v-dialog v-model="dialog" max-width="380px">
      <v-card>
        <v-card-title>Filter by Categories</v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12">
                <v-checkbox
                  v-model="allCategoriesSelected"
                  label="Select All"
                  @change="toggleAllCategories"
                ></v-checkbox>
                <v-divider></v-divider>
                <v-checkbox
                  v-for="category in categories"
                  :key="category.value"
                  v-model="category_ids"
                  :value="category.value"
                  :label="category.text"
                  @change="
                    categories.length == category_ids.length
                      ? (allCategoriesSelected = true)
                      : (allCategoriesSelected = false)
                  "
                ></v-checkbox>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn text @click="dialog = false">Cancel</v-btn>
          <v-btn color="primary" text @click="applyFilter()"
            >Apply Filter</v-btn
          >
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
import axios from "axios";
export default {
  components: {},
  data: () => ({
    dialog: false,
    description:
      "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero modi error quasi fugit debitis quidem alias fuga ipsum. Incidunt tenetur dignissimos porro aliquid alias nesciunt deserunt eius ad fuga quis?",
    Recipes: [],
    category_ids: [],
    allCategoriesSelected: false, // For "Select All" checkbox
    categories: [], // Populated by getCategories()
  }),

  created() {
    this.getCategories();
    this.getRecipes();
  },
  computed: {
    selectedCategories() {
      return this.categories.filter((category) =>
        this.category_ids.includes(category.value)
      );
    },
  },
  methods: {
    getCategories() {
      axios
        .get("/api/categories")
        .then((res) => {
          this.categories = res.data.data.map((element) => {
            return {
              text: element.name,
              value: element.id,
            };
          });
        })
        .catch((e) => {});
    },
    getRecipes() {
      var obj = {};
      if (this.category_ids.length) {
        obj.category_ids = this.category_ids;
      }
      axios
        .post("/api/filter_recipes", obj)
        .then((response) => {
          this.Recipes = response.data.data;
        })
        .catch((e) => {});
    },
    toggleAllCategories() {
      if (this.allCategoriesSelected) {
        // Select all
        this.category_ids = this.categories.map((category) => category.value);
      } else {
        // Deselect all
        this.category_ids = [];
      }
    },
    applyFilter() {
      this.dialog = false;
      this.getRecipes();
    },
  },
};
</script>

<style>
.no-data-message {
  font-size: 18px;
  color: #888;
  margin-top: 20px;
}
</style>

