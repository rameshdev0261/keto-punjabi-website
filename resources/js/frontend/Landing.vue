<template>
  <div>
    <v-app>
      <Navbar />
      <v-main class="front-body">
        <Banner
          :bannerImage="dashboard.banner_image"
          :videoLink="dashboard.video_link"
        />
        
        <RecipesByCategories :description="dashboard.my_recipe_description"/>
        <WhatsKeto :description="dashboard.keto_diet_description" />
        <AboutSection :ownerBox="dashboard.owner_box" />
        <ByCategories :categories="cats" />
        <LatestRecipes
          :description="dashboard.my_recipe_description"
          :latestRecipes="latest_recipes"
        />
        <ProductsSection :products="products" />
      </v-main>
      <Footer />
    </v-app>
  </div>
</template>

<script>
import Navbar from "./common/Navbar.vue";
import Footer from "./common/Footer.vue";
import Banner from "./landing-sections/Banner.vue";
import WhatsKeto from "./landing-sections/WhatIsKeto.vue";
import ByCategories from "./landing-sections/ViewByCategories.vue";
import LatestRecipes from "./landing-sections/LatestRecipes.vue";
import ProductsSection from "./landing-sections/ProductsSection.vue";
import AboutSection from "./landing-sections/AboutSection.vue";
import RecipesByCategories from "./landing-sections/RecipesByCategories.vue";
export default {
  props: ["dashboard", "cats", "latest_recipes", "products"],

  components: {
    Navbar,
    Footer,
    Banner,
    WhatsKeto,
    ByCategories,
    LatestRecipes,
    ProductsSection,
    AboutSection,
    RecipesByCategories
  },
};
</script>

<style></style>
