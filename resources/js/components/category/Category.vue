<template>
  <div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categories</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Categories</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-primary" @click="addNewCategory">Add Category</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>SL No</th>
                      <th>Category</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(category, index) in categories" :key="category.id">
                      <td>{{ index + 1 }}</td>
                      <td>{{ category.category }}</td>
                      <td>
                        <a
                          href="#"
                          @click="editCategory(category)"
                          class="btn btn-primary btn-xs"
                          data-toggle="tooltip"
                          data-plcaement="top"
                          data-original-title="Edit"
                        >
                          <i class="fa fa-edit"></i>
                        </a>
                        <a
                          href="#"
                          @click="deleteCategory(category.id)"
                          class="btn btn-danger btn-xs"
                          data-toggle="tooltip"
                          data-plcaement="top"
                          data-original-title="Delete"
                        >
                          <i class="fa fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="exampleModalLabel"
            >{{ editMode ? 'Update' : 'Create' }} Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editMode ? updateCategory() : createCategory()">
            <div class="modal-body">
              <div class="form-group">
                <input
                  v-model="form.category"
                  type="text"
                  name="category"
                  placeholder="Enter Category"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('category') }"
                >
                <has-error :form="form" field="category"></has-error>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "category",
  data() {
    return {
      categories: {},
      editMode: false,
      form: new Form({
        id: "",
        category: ""
      })
    };
  },
  methods: {
    addNewCategory() {
      this.editMode = false;
      this.form.reset();
      $("#exampleModal").modal("show");
    },
    editCategory(category) {
      this.editMode = true;
      this.form.clear();
      this.form.fill(category);
      $("#exampleModal").modal("show");
    },
    createCategory() {
      this.$Progress.start();
      this.form
        .post("api/category")
        .then(() => {
          Fire.$emit("AfterResult");
          $("#exampleModal").modal("hide");
          Toast.fire({
            type: "success",
            title: "Category created successfully"
          });
          this.$Progress.finish();
        })
        .catch(err => console.log(err.response.data));
    },
    updateCategory() {
      this.$Progress.start();
      this.form
        .put("api/category/" + this.form.id)
        .then(() => {
          Fire.$emit("AfterResult");
          $("#exampleModal").modal("hide");
          Toast.fire({
            type: "success",
            title: "Category updated successfully"
          });
          this.$Progress.finish();
        })
        .catch(err => console.log(err.response.data));
    },
    deleteCategory(categoryId) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then(result => {
        if (result.value) {
          this.form
            .delete("api/category/" + categoryId)
            .then(() => {
              Swal.fire("Deleted!", "Category has been deleted.", "success");
              Fire.$emit("AfterResult");
            })
            .catch(() => {
              Swal.fire("", "Something wrong", "warning");
            });
        }
      });
    },
    loadCategory() {
      axios
        .get("api/category")
        .then(res => {
          this.categories = res.data.data;
        })
        .catch(err => console.log(err.response.data));
    }
  },
  computed: {
    //console.log(this.$store.getters.categories);
  },
  mounted() {
    //  [App.vue specific] When App.vue is finish loading finish the progress bar
    this.$Progress.finish();
  },
  created() {
    this.loadCategory();

    Fire.$on("AfterResult", () => {
      this.loadCategory();
    });

    //  [App.vue specific] When App.vue is first loaded start the progress bar
    this.$Progress.start();
  }
};
</script>

<style scoped>
</style>
