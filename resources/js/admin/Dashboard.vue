<template>
  <div>
    <v-container>
      <v-breadcrumbs class="px-0" :items="bread"></v-breadcrumbs>
      <h1 class="mb-2">Overview</h1>
      <br />
      <v-row>
        <v-col cols="12" sm="4" md="3" lg="3">
          <div class="dashboard-card">
            <h2>{{ total_recipes }}</h2>
            <p>Total Recipes</p>

            <v-icon>mdi-food-fork-drink</v-icon>
          </div>
        </v-col>
        <v-col cols="12" sm="4" md="3" lg="3">
          <div class="dashboard-card card-primary">
            <h2>{{ total_products }}</h2>
            <p>Total Products</p>

            <v-icon>mdi-food-variant</v-icon>
          </div>
        </v-col>
        <v-col cols="12" sm="4" md="3" lg="3">
          <div class="dashboard-card">
            <h2>{{ total_blogs }}</h2>
            <p>Blogs</p>

            <v-icon>mdi-text-box</v-icon>
          </div>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
export default {
  data: () => ({
    total_recipes: 0,
    total_products: 0,
    total_blogs: 0,
    bread: [
      {
        text: "Dashboard",
        disabled: true,
        to: "/admin/dashboard",
      },
    ],
  }),
  created() {
    axios
      .get("/api/dashboard")
      .then((response) => {
        this.total_recipes = response.data.data.total_recipes;
        this.total_products = response.data.data.total_products;
        this.total_blogs = response.data.data.total_blogs;
      })
      .catch((error) => {});
  },
};
</script>

<style></style>
