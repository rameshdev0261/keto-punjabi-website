<template>
  <div>
    <v-container>
      <v-breadcrumbs class="px-0" :items="bread"></v-breadcrumbs>
      <h1 class="mb-2">Blogs</h1>
      <v-data-table
        :headers="headers"
        :items="blogsList"
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
              @click="addBlog()"
              dark
              class="mb-2"
              depressed
            >
              Add New
            </v-btn>
          </v-toolbar>
        </template>
        <template v-slot:item.image="{ item }">
          <img class="table-image" :src="item.image" :alt="item.name" />
        </template>

        <template v-slot:item.description="{ item }">
          <p v-html="item.description"></p>
        </template>

        <template v-slot:item.created_at="{ item }">
          <span>{{ item.created_at | moment("dddd, MMMM Do YYYY") }}</span>
        </template>
        <template v-slot:item.actions="{ item }">
          <v-icon size="22" class="mr-2" @click="editBlog(item)">
            mdi-pencil
          </v-icon>
          <v-icon size="22" color="red" @click="deleteBlog(item)">
            mdi-delete
          </v-icon>
        </template>
      </v-data-table>
    </v-container>

    <v-dialog v-model="deleteDialog" max-width="380px">
      <v-card>
        <v-card-title>Are you sure you want to delete this Blog?</v-card-title>
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
        text: "Blogs",
        disabled: true,
        to: "",
      },
    ],
    search: "",
    deleteDialog: false,
    headers: [
      { text: "Image", width: "100px", value: "image" },
      { text: "Name", value: "name" },
      { text: "Description", value: "description" },
      { text: "Created at", value: "created_at" },
      {
        text: "Actions",
        align: "end",
        value: "actions",
        width: "100px",
        sortable: false,
      },
    ],
    blogsList: [],
    file: null,
    url: null,
    item_id: "",
  }),

  created() {
    this.initialize();
  },

  methods: {
    addBlog() {
      let item = JSON.stringify({
        name: "",
        video_link: "",
        description: "",
        image: null,
      });
      localStorage.setItem("blog", item);
      this.$router.push({ name: "addBlog" });
    },
    editBlog(item) {
      localStorage.setItem("blog", JSON.stringify(item));
      this.$router.push({ name: "editBlog" });
    },

    deleteBlog(item) {
      this.deleteDialog = true;
      this.item_id = item.id;
    },

    close() {
      this.deleteDialog = false;
    },
    initialize() {
      axios
        .get("/api/blogs")
        .then((response) => {
          this.blogsList = response.data.data;
        })
        .catch((error) => {});
    },
    destroy() {
      let url = "/api/blogs/" + this.item_id;
      axios
        .delete(url)
        .then((response) => {
          this.blogsList = response.data.data;
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
