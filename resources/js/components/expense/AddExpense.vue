<template>
  <div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Expense</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active">Add Expense</li>
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
                <h3 class="card-title">Add Expense</h3>
                <div class="card-tools">
                  <router-link
                    to="/view-expense-category"
                    class="btn btn-primary"
                  >View Expense Category</router-link>
                </div>
              </div>
              <!-- /.card-header -->
              <form role="form" @submit.prevent="createExpenseCategory">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="category">Category</label>
                        <input
                          v-model="form.category"
                          type="text"
                          class="form-control"
                          id="category"
                          placeholder="Enter Expense Category"
                          :class="{ 'is-invalid': form.errors.has('category') }"
                        >
                        <has-error :form="form" field="category"></has-error>
                      </div>
                      <div class="form-group">
                        <label for="description">Expense Description</label>
                        <textarea
                          v-model="form.description"
                          class="form-control"
                          id="description"
                          placeholder="Enter Expense Description"
                          rows="2"
                          :class="{ 'is-invalid': form.errors.has('description') }"
                        ></textarea>
                        <has-error :form="form" field="description"></has-error>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: new Form({
        id: "",
        category: "",
        description: ""
      })
    };
  },
  methods: {
    createExpenseCategory() {
      this.$Progress.start();
      this.form
        .post("api/expense-category")
        .then(() => {
          Toast.fire({
            type: "success",
            title: "Expense Category created successfully"
          });
          this.$Progress.finish();
          this.$router.push("/view-expense-category");
        })
        .catch(err => console.log(err.response.data));
    }
  },
  mounted() {
    //  [App.vue specific] When App.vue is finish loading finish the progress bar
    this.$Progress.finish();
  },
  created() {
    //  [App.vue specific] When App.vue is first loaded start the progress bar
    this.$Progress.start();
  }
};
</script>