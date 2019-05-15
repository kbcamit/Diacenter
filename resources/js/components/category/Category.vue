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
                    <tr>
                      <td>1</td>
                      <td>Blood</td>
                      <td>
                        <a
                          href="#"
                          class="btn btn-primary btn-xs"
                          data-toggle="tooltip"
                          data-plcaement="top"
                          data-original-title="Edit"
                        >
                          <i class="fa fa-edit"></i>
                        </a>
                        <a
                          href="#"
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
            <h5 class="modal-title" id="exampleModalLabel">Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="createCategory">
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
    createCategory() {
      //
    },
    loadCategory() {
      axios
        .get("api/category")
        .then(({ data }) => (this.categories = data.data))
        .catch(error => console.log(error));
    }
  },
  computed: {
    //console.log(this.$store.getters.categories);
  },
  mounted() {
    //console.log(this.categories);
    //  [App.vue specific] When App.vue is finish loading finish the progress bar
    this.$Progress.finish();
  },
  created() {
    //this.$store.dispatch("setCategory", this.loadCategory());
    this.loadCategory();
    //  [App.vue specific] When App.vue is first loaded start the progress bar
    this.$Progress.start();
  }
};
</script>

<style scoped>
</style>