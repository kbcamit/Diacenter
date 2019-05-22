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
              <li class="breadcrumb-item active">View Expense</li>
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
                <h3 class="card-title">All Expense Categories</h3>
                <div class="card-tools">
                  <router-link
                    to="/add-expense-category"
                    class="btn btn-primary"
                  >Add Expense Category</router-link>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>SL No</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(expense, index) in expenses.data" :key="expense.id">
                      <td>{{ index + 1 }}</td>
                      <td>{{ expense.category }}</td>
                      <td>{{ expense.description }}</td>
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
  </div>
</template>

<script>
export default {
  data() {
    return {
      expenses: {}
    };
  },
  methods: {
    loadExpenseCategories() {
      axios
        .get("api/expense-category")
        .then(res => {
          this.expenses = res.data;
        })
        .catch(err => console.log(err.response.data));
    }
  },
  mounted() {
    //  [App.vue specific] When App.vue is finish loading finish the progress bar
    this.$Progress.finish();
  },
  created() {
    this.loadExpenseCategories();
    //  [App.vue specific] When App.vue is first loaded start the progress bar
    this.$Progress.start();
  }
};
</script>