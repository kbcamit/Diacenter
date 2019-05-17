<template>
  <div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Subcategories</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active">Subcategories</li>
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
                <h3 class="card-title">All Subcategories</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-primary" @click="addNewSubcategory">
                    Add
                    Subcategory
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>SL No</th>
                      <th>Category</th>
                      <th>Subcategory</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(subcategory, index) in subcategories" :key="subcategory.id">
                      <td>{{ index + 1 }}</td>
                      <td>{{ subcategory.v_category }}</td>
                      <td>{{ subcategory.subcategory }}</td>
                      <td>
                        <a
                          href="#"
                          @click="editSubcategory(subcategory)"
                          class="btn btn-primary btn-xs"
                          data-toggle="tooltip"
                          data-plcaement="top"
                          data-original-title="Edit"
                        >
                          <i class="fa fa-edit"></i>
                        </a>
                        <a
                          href="#"
                          @click="deleteSubcategory(subcategory.id)"
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
            >{{ editMode ? 'Update' : 'Create' }} Subcategory</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editMode ? updateSubcategory() : createSubcategory()">
            <div class="modal-body">
              <div class="form-group">
                <select
                  v-model="form.category"
                  name="category"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('category') }"
                >
                  <option value>--Select Category--</option>
                  <option
                    v-for="category in categories"
                    :value="category.id"
                    :key="category.id"
                  >{{ category.category }}</option>
                </select>
                <has-error :form="form" field="category"></has-error>
              </div>
              <div class="form-group">
                <input
                  v-model="form.subcategory"
                  type="text"
                  name="subcategory"
                  placeholder="Enter Subcategory"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('subcategory') }"
                >
                <has-error :form="form" field="subcategory"></has-error>
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
  name: "subcategory",
  data() {
    return {
      categories: {},
      subcategories: {},
      editMode: false,
      form: new Form({
        id: "",
        category: "",
        subcategory: ""
      })
    };
  },
  methods: {
    addNewSubcategory() {
      this.editMode = false;
      this.form.reset();
      $("#exampleModal").modal("show");
    },
    editSubcategory(subcategory) {
      this.editMode = true;
      this.form.clear();
      this.form.fill(subcategory);
      $("#exampleModal").modal("show");
    },
    createSubcategory() {
      this.$Progress.start();
      this.form
        .post("api/subcategory")
        .then(() => {
          Fire.$emit("AfterResult");
          $("#exampleModal").modal("hide");
          Toast.fire({
            type: "success",
            title: "Subcategory created successfully"
          });
          this.$Progress.finish();
        })
        .catch(err => console.log(err.response.data));
    },
    updateSubcategory() {
      this.$Progress.start();
      this.form
        .put("api/subcategory/" + this.form.id)
        .then(() => {
          Fire.$emit("AfterResult");
          $("#exampleModal").modal("hide");
          Toast.fire({
            type: "success",
            title: "Subcategory updated successfully"
          });
          this.$Progress.finish();
        })
        .catch(err => console.log(err.response.data));
    },
    deleteSubcategory(subcategoryId) {
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
            .delete("api/subcategory/" + subcategoryId)
            .then(() => {
              Swal.fire("Deleted!", "Subcategory has been deleted.", "success");
              Fire.$emit("AfterResult");
            })
            .catch(() => {
              Swal.fire("", "Something wrong", "warning");
            });
        }
      });
    },
    loadCategories() {
      axios
        .get("api/category")
        .then(res => {
          this.categories = res.data.data;
        })
        .catch(err => console.log(err.response.data));
    },
    loadSubcategories() {
      axios
        .get("api/subcategory")
        .then(res => {
          this.subcategories = res.data.data;
        })
        .catch(err => console.log(err.response.data));
    }
  },
  mounted() {
    //  [App.vue specific] When App.vue is finish loading finish the progress bar
    this.$Progress.finish();
  },
  created() {
    this.loadCategories();

    this.loadSubcategories();

    Fire.$on("AfterResult", () => {
      this.loadSubcategories();
    });
    //  [App.vue specific] When App.vue is first loaded start the progress bar
    this.$Progress.start();
  }
};
</script>

<style scoped>
</style>