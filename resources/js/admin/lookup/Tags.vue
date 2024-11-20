<template>
  <div>
    <v-container>
      <v-breadcrumbs class="px-0" :items="bread"></v-breadcrumbs>
      <h1 class="mb-2">Tags</h1>
      <v-data-table
        :headers="headers"
        :items="tagsList"
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
                  Add Tag
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
                          v-model="tag.icon"
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
                      <p class="fields-label">Tag Name</p>
                      <v-text-field
                        dense
                        v-model="tag.name"
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

        <template v-slot:item.icon="{ item }">
          <v-icon color="black" size="22">
            {{ item.icon }}
          </v-icon>
        </template>

        <template v-slot:item.actions="{ item }">
          <v-icon size="22" class="mr-2" @click="editItem(item)">
            mdi-pencil
          </v-icon>
          <v-icon size="22" color="red" @click="deleteTag(item)">
            mdi-delete
          </v-icon>
        </template>
      </v-data-table>
    </v-container>

    <v-dialog v-model="deleteDialog" max-width="380px">
      <v-card>
        <v-card-title>Are you sure you want to delete this Tag?</v-card-title>
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
        to: "/admin/dashboard",
      },
      {
        text: "Lookup Tables",
        disabled: true,
        to: "",
      },
      {
        text: "Tags",
        disabled: true,
        to: "",
      },
    ],
    search: "",
    dialog: false,
    deleteDialog: false,
    headers: [
      { text: "Icon", value: "icon" },
      { text: "Name", value: "name" },
      { text: "Created at", value: "created_at" },
      {
        text: "Actions",
        align: "end",
        value: "actions",
        sortable: false,
      },
    ],
    tagsList: [],
    editedIndex: -1,
    item_id: "",
    tag: {
      name: "",
      icon: "",
    },
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "New Tag" : "Edit Tag";
    },
  },

  created() {
    this.initialize();
  },

  methods: {
    // initialize() {
    // this.tagsList = [
    //     {
    //         id: "1",
    //         name: "15 Minutes",
    //         icon: "mdi-clock",
    //         created_at: "31 jan 2022 - 10:00 pm",
    //     },
    //     {
    //         id: "2",
    //         name: "Breakfast",
    //         icon: "mdi-food-fork-drink",
    //         created_at: "31 jan 2022 - 10:00 pm",
    //     },
    //     {
    //         id: "3",
    //         name: "Very easy",
    //         icon: "mdi-thumb-up",
    //         created_at: "31 jan 2022 - 10:00 pm",
    //     },
    //     {
    //         id: "4",
    //         name: "Main Dishes",
    //         icon: "mdi-star",
    //         created_at: "31 jan 2022 - 10:00 pm",
    //     },
    // ];
    // },

    close() {
      this.editedIndex = -1;
      this.dialog = false;
      this.deleteDialog = false;
    },

    editItem(item) {
      this.editedIndex = this.tagsList.indexOf(item);
      this.dialog = true;
      this.tag = {
        id: item.id,
        name: item.name,
        icon: item.icon,
      };
    },

    deleteTag(item) {
      this.deleteDialog = true;
      this.item_id = item.id;
    },

    close() {
      this.editedIndex = -1;
      this.dialog = false;
      this.deleteDialog = false;
      this.tag = {
        name: "",
        icon: "",
      };
    },
    initialize() {
      axios
        .get("/api/tags")
        .then((response) => {
          this.tagsList = response.data.data;
        })
        .catch((error) => {});
    },

    save() {
      let form = new FormData();
      form.append("name", this.tag.name);
      form.append("icon", this.tag.icon);

      let url = "/api/tags";
      if (this.editedIndex != -1) {
        form.append("id", this.tag.id);
        url = "/api/tags/edit";
      }
      axios
        .post(url, form)
        .then((response) => {
          this.tagsList = response.data.data;
          this.close();
        })
        .catch((error) => {
          alert("Error");
        });
    },
    destroy() {
      let url = "/api/tags/" + this.item_id;
      axios
        .delete(url)
        .then((response) => {
          this.tagsList = response.data.data;
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
