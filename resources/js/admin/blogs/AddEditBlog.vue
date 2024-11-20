<template>
  <div>
    <v-container>
      <v-breadcrumbs class="px-0" :items="bread"></v-breadcrumbs>
      <v-card-actions>
        <h1 class="mb-3">{{ pageTitle }}</h1>
        <v-spacer></v-spacer>
        <v-btn depressed min-width="120" large @click="save()" color="primary"
          >Publish</v-btn
        >
      </v-card-actions>

      <v-row>
        <v-col cols="12" md="7" sm="7">
          <div class="admin-card p-a-30">
            <v-row>
              <v-col cols="12" sm="12" md="12">
                <p class="fields-label">Title</p>
                <v-text-field v-model="blog.name" outlined dense></v-text-field>
              </v-col>
              <v-col class="pt-0" cols="12" sm="12" md="12">
                <p class="fields-label">Video Link</p>
                <v-text-field
                  v-model="blog.video_link"
                  outlined
                  dense
                ></v-text-field>
              </v-col>

              <v-col class="pt-0" cols="12" sm="12" md="12">
                <p class="fields-label">Description</p>
                <quill-editor
                  v-model="blog.description"
                  ref="myQuillEditor"
                  :options="editorOption"
                >
                </quill-editor>
              </v-col>
            </v-row>
          </div>
          <br />
        </v-col>

        <v-col cols="12" md="5" sm="5">
          <div class="admin-card p-a-30">
            <h2 class="mb-3">Video Thumbnail</h2>

            <div class="preview-image">
              <img :src="url" />
            </div>
            <input type="file" @change="onFileChange" id="file-upload" />
            <label for="file-upload" class="custom-file-upload">
              Choose Image
            </label>
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
    blog: localStorage.hasOwnProperty("blog")
      ? JSON.parse(localStorage.getItem("blog"))
      : { name: "", description: "", image: "" },
    bread: [
      {
        text: "Dashboard",
        disabled: false,
        to: "dashboard",
      },
      {
        text: "Blogs",
        disabled: false,
        to: "/admin/blogs",
      },
      {
        text: "Add New Blog",
        disabled: true,
        to: "",
      },
    ],
    recipe_category: ["Vegetarian", "Non-Veg", "Eggs"],
    tags: ["15 Minutes", "Breakfast", "Very Easy", "Main Dishes"],
    content: "<p>example content</p>",
    editorOption: {},
    nutritions: ["Calories", "Proteins", "Carbs", "Fats", "Fiber"],
    file: null,
    url: null,
    pageTitle: "Add New Blog",
  }),

  computed: {
    editor() {
      return this.$refs.myQuillEditor.quill;
    },
  },

  created() {
    if (this.$route.name == "editBlog") {
      this.pageTitle = "Edit Blog";
      this.bread[2].text = "Edit Blog";
    }
    this.url = this.blog.image;
  },

  methods: {
    onFileChange(e) {
      this.file = e.target.files[0];
      this.url = URL.createObjectURL(this.file);
    },

    save() {
      let form = new FormData();
      form.append("name", this.blog.name);
      form.append("video_link", this.blog.video_link);
      form.append("description", this.blog.description);
      let url = "/api/blogs";
      if (this.blog.id) {
        form.append("id", this.blog.id);
        url = "/api/blogs/edit";
      }
      if (this.file != null) {
        form.append("file", this.file);
      }
      axios
        .post(url, form)
        .then((response) => {
          this.$router.push({ name: "blogs" });
        })
        .catch((error) => {
          alert("Error");
        });
    },
  },
};
</script>

<style></style>
