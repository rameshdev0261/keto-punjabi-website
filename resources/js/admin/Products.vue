<template>
  <div>
    <v-container>
      <v-breadcrumbs class="px-0" :items="bread"></v-breadcrumbs>
      <h1 class="mb-2">Products</h1>
      <v-data-table
        :headers="headers"
        :items="productsList"
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
                  New Product
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
                      <div class="preview-image">
                        <img :src="url" />
                      </div>
                      <input
                        type="file"
                        @change="onFileChange"
                        id="file-upload"
                      />
                      <label for="file-upload" class="custom-file-upload">
                        Choose Image
                      </label>
                    </v-col>
                    <h3>Or</h3>
                     <v-col cols="12" sm="12" md="12">
                      <p class="fields-label">Paste image link</p>
                      <v-text-field
                        v-model="product.image_link"
                        dense
                        outlined
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="12" md="12">
                      <p class="fields-label">Product Title</p>
                      <v-text-field
                        v-model="product.title"
                        dense
                        outlined
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="12" md="12">
                      <p class="fields-label">Link</p>
                      <v-text-field
                        v-model="product.link"
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
        <template v-slot:item.image="{ item }">
          <img class="table-image" :src="item.image" :alt="item.title" />
        </template>
        <template v-slot:item.created_at="{ item }">
          <span>{{ item.created_at | moment("dddd, MMMM Do YYYY") }}</span>
        </template>
        <template v-slot:item.actions="{ item }">
          <a :href="item.link" target="_blank"
            ><v-icon size="22" class="mr-2" color="primary">
              mdi-open-in-new
            </v-icon></a
          >
          <v-icon size="22" class="mr-2" @click="editItem(item)">
            mdi-pencil
          </v-icon>
          <v-icon size="22" color="red" @click="deleteProduct(item)">
            mdi-delete
          </v-icon>
        </template>
      </v-data-table>
    </v-container>

    <v-dialog v-model="deleteDialog" max-width="380px">
      <v-card>
        <v-card-title
          >Are you sure you want to delete this Product?</v-card-title
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
        text: "Products",
        disabled: true,
        to: "",
      },
    ],
    search: "",
    dialog: false,
    deleteDialog: false,
    headers: [
      { text: "Image", width: "100px", value: "image" },
      { text: "title", value: "title" },
      { text: "Created at", value: "created_at" },
      {
        text: "Actions",
        align: "end",
        value: "actions",
        sortable: false,
      },
    ],
    productsList: [],
    editedIndex: -1,
    url: null,
    file: null,
    item_id: "",
    product: {
      title: "",
      link: "",
      image_link:""
    },
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "New Product" : "Edit Product";
    },
  },

  created() {
    this.initialize();
  },

  methods: {
    editItem(item) {
      this.editedIndex = this.productsList.indexOf(item);
      this.dialog = true;
      this.product = {
        id: item.id,
        title: item.title,
        link: item.link,
      };
      this.url = item.image;
    },

    deleteProduct(item) {
      this.deleteDialog = true;
      this.item_id = item.id;
    },

    onFileChange(e) {
      this.file = e.target.files[0];
      this.url = URL.createObjectURL(this.file);
    },

    close() {
      this.editedIndex = -1;
      this.dialog = false;
      this.deleteDialog = false;
      this.file = null;
      this.url = null;

      this.product = {
        title: "",
        link: "",
        image_link:""
      };
    },
    initialize() {
      axios
        .get("/api/products")
        .then((response) => {
          this.productsList = response.data.data;
        })
        .catch((error) => {});
    },

    save() {
      let form = new FormData();
      form.append("title", this.product.title);
      form.append("link", this.product.link);
      let url = "/api/products";
      if (this.editedIndex != -1) {
        form.append("id", this.product.id);
        url = "/api/products/edit";
      }
      if(this.product.image_link){
        form.append("image_link", this.product.image_link);
      }else if (this.file != null) {
        form.append("file", this.file);
      }
      axios
        .post(url, form)
        .then((response) => {
          this.productsList = response.data.data;
          this.close();
        })
        .catch((error) => {
          alert("Error");
        });
    },
    destroy() {
      let url = "/api/products/" + this.item_id;
      axios
        .delete(url)
        .then((response) => {
          this.productsList = response.data.data;
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
