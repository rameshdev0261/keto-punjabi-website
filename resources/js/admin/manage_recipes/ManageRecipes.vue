<template>
  <div>
    <v-container>
      <v-breadcrumbs class="px-0" :items="bread"></v-breadcrumbs>
      <h1 class="mb-2">Manage Recipes</h1>
      <v-data-table
        :headers="headers"
        :items="recipesList"
        :search="search"
        class="admin-card"
      >
        <template v-slot:top>
          <v-toolbar flat>
            <v-text-field
              dense
              v-model="search"
              outlined
              placeholder="Search...."
              hide-details=""
            ></v-text-field>

            <v-spacer></v-spacer>
            <v-btn
              color="primary"
              @click="addRecipe()"
              dark
              class="mb-2"
              depressed
            >
              New Recipe
            </v-btn>
          </v-toolbar>
        </template>
        <template v-slot:item.thumbnail="{ item }">
          <img class="table-image" :src="item.thumbnail" :alt="item.title" />
        </template>
        <template v-slot:item.diet_type="{ item }">
          <div class="type-badge">
            <img v-if="item.diet_type == 'Vegetarian'" :src="'/assets/veg.svg'" alt="" />
            <img v-else :src="'/assets/non-veg.svg'" alt="" />
          </div>
        </template>

        <template v-slot:item.created_at="{ item }">
          <span>{{ item.created_at | moment("dddd, MMMM Do YYYY") }}</span>
        </template>

        <template v-slot:item.actions="{ item }">
          <v-icon size="22" class="mr-2" @click="editRecipe(item)">
            mdi-pencil
          </v-icon>
          <v-icon size="22" color="red" @click="deleteRecipe(item)">
            mdi-delete
          </v-icon>
        </template>
      </v-data-table>
    </v-container>

    <v-dialog v-model="deleteDialog" max-width="380px">
      <v-card>
        <v-card-title
          >Are you sure you want to delete this Recipe?</v-card-title
        >
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn text @click="close">Cancel</v-btn>
          <v-btn color="primary" text @click="destroy()">Yes</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
export default {
  data: () => ({
    bread: [
      {
        text: "Dashboard",
        disabled: false,
        to: "dashboard",
      },
      {
        text: "Recipes",
        disabled: true,
        to: "",
      },
    ],
    search: "",
    dialog: false,
    deleteDialog: false,
    headers: [
      { text: "Image", width: "100px", value: "thumbnail" },
      { text: "Name", value: "title" },
      { text: "Description", value: "short_description" },
      { text: "Type", value: "diet_type" },
      { text: "Created at", value: "created_at" },
      {
        text: "Actions",
        align: "end",
        value: "actions",
        width: "100px",
        sortable: false,
      },
    ],
    recipesList: [],
    item_id: "",
  }),

  created() {
    this.initialize();
  },

  methods: {
    addRecipe() {
      let item = JSON.stringify({
        title: "",
        short_description: "",
        thumbnail: "",
        difficulty: "",
        diet_type: "",
        category: "",
        category_id: "",
        prep_time: "",
        video_link: "",
        image: null,
      });
      localStorage.setItem("recipe", item);
      this.$router.push({ name: "addNewRecipe" });
    },
    editRecipe(item) {
      localStorage.setItem("recipe", JSON.stringify(item));
      this.$router.push({ name: "editRecipe" });
    },

    deleteRecipe(item) {
      this.deleteDialog = true;
      this.item_id = item.id;
    },

    close() {
      this.deleteDialog = false;
    },
    initialize() {
      axios
        .get("/api/recipes")
        .then((response) => {
          this.recipesList = response.data.data;
        })
        .catch((error) => {});
    },

    destroy() {
      let url = "/api/recipes/" + this.item_id;
      axios
        .delete(url)
        .then((response) => {
          this.recipesList = response.data.data;
          this.close();
        })
        .catch((error) => {
          alert("Error");
        });
    },
  },
};
</script>

<style></style>
