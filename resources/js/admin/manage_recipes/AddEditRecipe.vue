<template>
  <div>
    <v-container>
      <v-breadcrumbs class="px-0" :items="bread"></v-breadcrumbs>
      <v-card-actions>
        <h1 class="mb-3">{{ pageTitle }}</h1>
        <v-spacer></v-spacer>
        <v-btn depressed min-width="120" @click="save()" large color="primary"
          >Publish</v-btn
        >
      </v-card-actions>

      <v-row>
        <v-col cols="12" md="7" sm="7">
          <div class="admin-card p-a-30">
            <v-row>
              <v-col cols="12" sm="12" md="12">
                <p class="fields-label">Name</p>
                <v-text-field
                  v-model="recipe.title"
                  outlined
                  dense
                ></v-text-field>
              </v-col>
              <v-col class="pt-0" cols="12" sm="12" md="12">
                <p class="fields-label">Video Link</p>
                <v-text-field
                  v-model="recipe.video_link"
                  outlined
                  dense
                ></v-text-field>
              </v-col>

              <v-col class="pt-0" cols="12" sm="12" md="12">
                <p class="fields-label">Recipe Category</p>
                <v-select
                  v-model="recipe.category_id"
                  :items="categoriesList"
                  outlined
                  dense
                ></v-select>
              </v-col>
              <v-col class="pt-0" cols="12" sm="6" md="6">
                <p class="fields-label">Diet Type</p>
                <v-select
                  v-model="recipe.diet_type"
                  :items="diteTypes"
                  outlined
                  dense
                ></v-select>
              </v-col>
              <v-col class="pt-0" cols="12" sm="6" md="6">
                <p class="fields-label">Tags</p>
                <v-autocomplete
                  :items="tagsList"
                  outlined
                  dense
                  multiple
                  small-chips
                  v-model="tags"
                ></v-autocomplete>
              </v-col>
              <v-col class="pt-0" cols="12" sm="12" md="12">
                <p class="fields-label">Description</p>
                <quill-editor
                  v-model="recipe.short_description"
                  ref="myQuillEditor"
                  :options="editorOption"
                >
                </quill-editor>
              </v-col>
            </v-row>
          </div>
          <br />
          <div class="admin-card p-a-30">
            <v-card-actions class="pa-0 mb-3">
              <h2 class="mb-3">Used Ingredients</h2>
              <v-spacer></v-spacer>
              <v-btn depressed @click="addIngredient()" color="primary"
                >Add New</v-btn
              >
            </v-card-actions>
            <v-row v-for="(item, i) in ingredients" :key="i">
              <v-col cols="12" sm="6" md="6">
                <v-text-field
                  v-model="item.ingredient"
                  placeholder="Name"
                  outlined
                  dense
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="5" md="5">
                <v-text-field
                  placeholder="Amount"
                  outlined
                  v-model="item.quantity"
                  dense
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="1" md="1">
                <v-btn fab text small depressed @click="removeIngredient(i)"
                  ><v-icon>mdi-window-close</v-icon></v-btn
                >
              </v-col>
            </v-row>
          </div>

          <br />
          <div class="admin-card p-a-30">
            <v-card-actions class="pa-0 mb-3">
              <h2 class="mb-3">Instructions</h2>
              <v-spacer></v-spacer>
              <v-btn depressed @click="addDirection()" color="primary"
                >Add New</v-btn
              >
            </v-card-actions>

            <v-row v-for="(item, i) in directions" :key="i">
              <v-col cols="10" sm="11" md="11">
                <v-textarea
                  placeholder="Type Instructions"
                  outlined
                  v-model="item.description"
                  rows="2"
                ></v-textarea>
              </v-col>
              <v-col cols="2" sm="1" md="1">
                <v-btn fab text small depressed @click="removeDirection(i)"
                  ><v-icon>mdi-window-close</v-icon></v-btn
                >
              </v-col>
            </v-row>
          </div>
        </v-col>

        <v-col cols="12" md="5" sm="5">
          <div class="admin-card p-a-30">
            <h2 class="mb-3">Add Image</h2>

            <div class="preview-image">
              <img :src="url" />
            </div>
            <input type="file" @change="onFileChange" id="file-upload" />
            <label for="file-upload" class="custom-file-upload">
              Choose Image
            </label>
          </div>
          <br />
          <div class="admin-card p-a-30">
            <v-card-actions class="pa-0 mb-3">
              <h2 class="mb-3">Nutritions</h2>
              <v-spacer></v-spacer>
              <v-btn depressed @click="addNutrition()" color="primary"
                >Add New</v-btn
              >
            </v-card-actions>
            <v-row v-for="(item, i) in nutritions" :key="i">
              <v-col cols="12" sm="5" md="5">
                <!-- <v-select
                  placeholder="Name"
                  :items="nutritions"
                  outlined
                  v-model="item.title"
                  dense
                ></v-select> -->
                <v-text-field
                  placeholder="Name"
                  outlined
                  dense
                  v-model="item.title"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="5" md="5">
                <v-text-field
                  placeholder="Quantity"
                  outlined
                  dense
                  v-model="item.value"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="2" md="2">
                <v-btn fab text small depressed @click="removeNutrition(i)"
                  ><v-icon>mdi-window-close</v-icon></v-btn
                >
              </v-col>
            </v-row>
          </div>
        </v-col>
      </v-row>

      <br />
      <br />
    </v-container>
  </div>
</template>

<script>
export default {
  data: () => ({
    recipe: localStorage.hasOwnProperty("recipe")
      ? JSON.parse(localStorage.getItem("recipe"))
      : {
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
        },
    bread: [
      {
        text: "Dashboard",
        disabled: false,
        to: "dashboard",
      },
      {
        text: "Recipes",
        disabled: false,
        to: "/admin/recipes",
      },
      {
        text: "Add New Recipe",
        disabled: true,
        to: "",
      },
    ],
    categoriesList: [],
    tagsList: [],
    ingredients: [],
    directions: [],
    nutritions: [],
    tags: [],
    short_description: "<p>example short_description</p>",
    editorOption: {},
    nutritions: ["Calories", "Proteins", "Carbs", "Fats", "Fiber"],
    url: null,
    file: null,
    pageTitle: "Add New Recipe",
    diteTypes: ["Vegetarian", "Non-vegetarian"],
  }),

  computed: {
    editor() {
      return this.$refs.myQuillEditor.quill;
    },
  },

  created() {
    if (this.$route.name == "editRecipe") {
      this.pageTitle = "Edit Recipe";
      this.bread[2].text = "Edit Recipe";
      this.url = this.recipe.thumbnail;
    }
    this.url = this.recipe.image;
    this.loadCommonData();
    this.recipeRelatedData();
  },

  methods: {
    addNutrition() {
      var item = {
        title: "",
        value: "",
      };

      this.nutritions.push(item);
    },
    removeNutrition(index) {
      this.nutritions.splice(index, 1);
    },

    addDirection() {
      var item = {
        description: "",
        step: this.directions.length + 1,
      };

      this.directions.push(item);
    },
    removeDirection(index) {
      this.directions.splice(index, 1);
    },

    addIngredient() {
      var item = {
        ingredient: "",
        quantity: "",
      };
      this.ingredients.push(item);
    },
    removeIngredient(index) {
      this.ingredients.splice(index, 1);
    },

    loadCommonData() {
      axios
        .get("/api/categories")
        .then((response) => {
          this.categoriesList = response.data.data.map((item) => {
            return {
              text: item.name,
              value: item.id,
            };
          });
        })
        .catch((error) => {});
      axios
        .get("/api/tags")
        .then((response) => {
          this.tagsList = response.data.data.map((item) => {
            return {
              text: item.name,
              value: item.id,
            };
          });
        })
        .catch((error) => {});
    },

    recipeRelatedData() {
      axios
        .get("/api/recipes/" + this.recipe.id)
        .then((response) => {
          this.tags = response.data.data.tags.map((item, index) => {
            return item.tag_id;
          });
          console.log(this.tags);
          this.nutritions = response.data.data.nutritions;
          this.ingredients = response.data.data.ingredients;
          this.directions = response.data.data.directions;
        })
        .catch((error) => {});
    },
    onFileChange(e) {
      this.file = e.target.files[0];
      console.log(this.file);
      this.url = URL.createObjectURL(this.file);
    },

    save() {
      let form = new FormData();
      form.append("title", this.recipe.title);
      form.append("short_description", this.recipe.short_description);
      form.append("video_link", this.recipe.video_link);
      form.append("diet_type", this.recipe.diet_type);
      form.append("category_id", this.recipe.category_id);
      if (this.file) {
        form.append("file", this.file);
      }

      form.append("tags", JSON.stringify(this.tags));
      form.append("nutritions", JSON.stringify(this.nutritions));
      form.append("ingredients", JSON.stringify(this.ingredients));
      form.append("directions", JSON.stringify(this.directions));

      let url = "/api/recipes";
      if (this.recipe.id) {
        form.append("id", this.recipe.id);
        url = "/api/recipes/edit";
      }
      axios
        .post(url, form)
        .then((response) => {
          this.$router.push({ name: "recipes" });
        })
        .catch((error) => {
          alert("Error");
        });
    },
  },
};
</script>

<style></style>
