<template>
  <div>
    <v-container>
      <v-breadcrumbs class="px-0" :items="bread"></v-breadcrumbs>
      <h1 class="mb-2">Contacted</h1>
      <v-data-table
        :headers="headers"
        :items="contactsList"
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
          </v-toolbar>
        </template>

        <template v-slot:item.created_at="{ item }">
          <span>{{ item.created_at | moment("dddd, MMMM Do YYYY") }}</span>
        </template>

        <template v-slot:item.actions="{ item }">
          <v-icon size="22" color="red" @click="deleteContact(item)">
            mdi-delete
          </v-icon>
        </template>
      </v-data-table>
    </v-container>

    <v-dialog v-model="deleteDialog" max-width="380px">
      <v-card>
        <v-card-title
          >Are you sure you want to delete this Contact?</v-card-title
        >
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn text @click="close">Cancel</v-btn>
          <v-btn color="primary" text @click="destroy">Yes</v-btn>
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
        text: "Contacted",
        disabled: true,
        to: "",
      },
    ],
    search: "",
    deleteDialog: false,
    headers: [
      { text: "Name", value: "name" },
      { text: "Email", value: "email" },
      { text: "Phone", value: "phone" },
      { text: "Message", value: "message" },
      { text: "Recived at", value: "created_at" },
      {
        text: "Actions",
        align: "end",
        value: "actions",
        sortable: false,
      },
    ],
    contactsList: [],
  }),

  created() {
    this.initialize();
  },

  methods: {
    close() {
      this.deleteDialog = false;
    },
    deleteContact(item) {
      this.deleteDialog = true;
      this.item_id = item.id;
    },

    close() {
      this.deleteDialog = false;
    },

    initialize() {
      axios
        .get("/api/contacts")
        .then((response) => {
          this.contactsList = response.data.data;
        })
        .catch((error) => {});
    },

    destroy() {
      let url = "/api/contacts/" + this.item_id;
      axios
        .delete(url)
        .then((response) => {
          this.contactsList = response.data.data;
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
