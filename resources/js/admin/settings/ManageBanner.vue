<template>
  <div>
    <v-container>
      <v-data-table
        :headers="headers"
        :items="slidersList"
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
                  New Slider
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
                      <br />
                      <br />
                    </v-col>
                    <v-col class="py-0" cols="12" sm="12" md="12">
                      <p class="fields-label">Title</p>
                      <v-text-field
                        dense
                        v-model="slider.title"
                        outlined
                      ></v-text-field>
                    </v-col>
                    <v-col class="py-0" cols="12" sm="12" md="12">
                      <p class="fields-label">Video link</p>
                      <v-text-field
                        v-model="slider.video_link"
                        outlined
                      ></v-text-field>
                    </v-col>
                    <v-col class="py-0" cols="12" sm="12" md="12">
                      <p class="fields-label">Content</p>
                      <v-textarea
                        v-model="slider.content"
                        outlined
                      ></v-textarea>
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
        <template v-slot:item.image="{ item }">
          <img class="table-image" :src="item.image" :alt="item.title" />
        </template>
        <template v-slot:item.actions="{ item }">
          <v-icon size="22" class="mr-2" @click="editItem(item)">
            mdi-pencil
          </v-icon>
          <v-icon size="22" color="red" @click="deleteItem(item)">
            mdi-delete
          </v-icon>
        </template>
      </v-data-table>
    </v-container>

    <v-dialog v-model="deleteDialog" max-width="380px">
      <v-card>
        <v-card-title
          >Are you sure you want to delete this Slider Item?</v-card-title
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
    dialog: false,
    deleteDialog: false,
    search: "",
    headers: [
      { text: "Image", width: "100px", value: "image" },
      { text: "Title", value: "title" },
      { text: "Content", value: "content" },
      { text: "Video link", value: "video_link" },
      { text: "Created at", value: "created_at" },
      {
        text: "Actions",
        align: "end",
        value: "actions",
        sortable: false,
      },
    ],
    slidersList: [],
    editedIndex: -1,
    slider: {
      title: "",
      content: "",
      video_link: "",
    },
    item_id: "",
    file: null,
    url: null,
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "New Item" : "Edit Item";
    },
  },

  created() {
    this.initialize();
  },

  methods: {
    editItem(item) {
      this.editedIndex = this.slidersList.indexOf(item);
      this.dialog = true;
      this.slider = {
        id: item.id,
        title: item.title,
        content: item.content,
        video_link: item.video_link,
      };
    },

    deleteItem(item) {
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
      (this.url = null),
        (this.file = null),
        (this.slider = {
          title: "",
          content: "",
        });
    },
    initialize() {
      axios
        .get("/api/sliders")
        .then((response) => {
          this.slidersList = response.data.data;
        })
        .catch((error) => {});
    },

    save() {
      let form = new FormData();
      form.append("title", this.slider.title);
      form.append("content", this.slider.content);
      form.append("video_link", this.slider.video_link);
      let url = "/api/sliders";
      if (this.editedIndex != -1) {
        form.append("id", this.slider.id);
        url = "/api/sliders/edit";
      }
      if (this.file != null) {
        form.append("file", this.file);
      }
      axios
        .post(url, form)
        .then((response) => {
          this.slidersList = response.data.data;
          this.close();
        })
        .catch((error) => {
          alert("Error");
        });
    },
    destroy() {
      let url = "/api/sliders/" + this.item_id;
      axios
        .delete(url)
        .then((response) => {
          this.slidersList = response.data.data;
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
