<template>
  <div>
    <v-container>
      <v-breadcrumbs class="px-0" :items="bread"></v-breadcrumbs>
      <h1 class="mb-2">Categories</h1>
      <v-data-table
        :headers="headers"
        :items="categoriesList"
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
            <v-dialog scrollable v-model="dialog" max-width="500px">
              <template v-slot:activator="{ on, attrs }">
                <v-btn
                  color="primary"
                  dark
                  class="mb-2"
                  v-bind="attrs"
                  v-on="on"
                  depressed
                >
                  New Category
                </v-btn>
              </template>
              <v-card>
                <v-card-title>
                  <span>{{ formTitle }}</span>
                </v-card-title>
                <v-divider></v-divider>
                <v-card-text>
                  <br />
                  <v-row>
                    <v-col cols="12" sm="12" md="12">
                      <v-alert dense type="info">
                        Simply copy icon from
                        <b>Material Design Icons</b> Kit and paste it
                        <b>Icon</b> fields
                      </v-alert>

                      <p class="fields-label">Icon</p>
                      <v-card-actions class="pa-0 align-start">
                        <v-text-field
                          v-model="category.icon"
                          dense
                          outlined
                        ></v-text-field>
                        <v-btn
                          href="https://pictogrammers.github.io/@mdi/font/5.4.55/"
                          target="_blank"
                          depressed
                          text
                          color="primary"
                          >Icons <v-icon right>mdi-open-in-new</v-icon></v-btn
                        >
                      </v-card-actions>
                    </v-col>
                    <v-col cols="12" sm="12" md="12">
                      <p class="fields-label">Category Name</p>
                      <v-text-field
                        v-model="category.name"
                        dense
                        outlined
                      ></v-text-field>
                    </v-col>
                  </v-row>
                </v-card-text>
                <v-divider></v-divider>
                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn color="darken-1" text @click="close"> Cancel </v-btn>
                  <v-btn color="darken-1" text @click="save()"> Save </v-btn>
                </v-card-actions>
              </v-card>
            </v-dialog>
          </v-toolbar>
        </template>

        <template v-slot:item.created_at="{ item }">
          <span>{{ item.created_at | moment("dddd, MMMM Do YYYY") }}</span>
        </template>

        <template v-slot:item.actions="{ item }">
          <v-icon size="22" class="mr-2" @click="editItem(item)">
            mdi-pencil
          </v-icon>
          <v-icon size="22" color="red" @click="deleteCategory(item)">
            mdi-delete
          </v-icon>
        </template>
      </v-data-table>
    </v-container>

    <v-dialog v-model="deleteDialog" max-width="380px">
      <v-card>
        <v-card-title
          >Are you sure you want to delete this Category?</v-card-title
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
import axios from "axios";
export default {
  data: () => ({
    bread: [
      {
        text: "Dashboard",
        disabled: false,
        to: "/admin/dashboard",
      },
      {
        text: "Lookup Tables",
        disabled: true,
        to: "",
      },
      {
        text: "Categories",
        disabled: true,
        to: "",
      },
    ],
    search: "",
    dialog: false,
    deleteDialog: false,
    headers: [
      // { text: "#", width: "100px", value: "id" },
      { text: "Name", value: "name" },
      { text: "Icon", value: "icon" },
      { text: "Created at", value: "created_at" },
      {
        text: "Actions",
        align: "end",
        value: "actions",
        sortable: false,
      },
    ],
    categoriesList: [],
    category: {
      name: "",
      icon: "",
    },
    editedIndex: -1,
    item_id: "",
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "New Category" : "Edit Category";
    },
  },

  created() {
    this.initialize();
  },

  methods: {
    editItem(item) {
      this.editedIndex = this.categoriesList.indexOf(item);
      this.dialog = true;
      this.category = {
        id: item.id,
        name: item.name,
        icon: item.icon,
      };
    },

    deleteCategory(item) {
      this.deleteDialog = true;
      this.item_id = item.id;
    },

    close() {
      this.editedIndex = -1;
      this.dialog = false;
      this.deleteDialog = false;
      this.category = {
        name: "",
        icon: "",
      };
    },
    initialize() {
      axios
        .get("/api/categories")
        .then((response) => {
          this.categoriesList = response.data.data;
        })
        .catch((error) => {});
    },

    save() {
      let form = new FormData();
      form.append("name", this.category.name);
      form.append("icon", this.category.icon);

      let url = "/api/categories";
      if (this.editedIndex != -1) {
        form.append("id", this.category.id);
        url = "/api/categories/edit";
      }
      axios
        .post(url, form)
        .then((response) => {
          this.categoriesList = response.data.data;
          this.close();
        })
        .catch((error) => {
          alert("Error");
        });
    },
    destroy() {
      let url = "/api/categories/" + this.item_id;
      axios
        .delete(url)
        .then((response) => {
          this.categoriesList = response.data.data;
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
