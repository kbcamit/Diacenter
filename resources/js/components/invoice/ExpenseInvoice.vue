<template>
  <div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Expense Invoice</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active">Add Expense Invoice</li>
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
                <h3 class="card-title">Add Expense Invoice</h3>
                <div class="card-tools">
                  <router-link to="/view-doctor" class="btn btn-primary">View Expense Invoices</router-link>
                </div>
              </div>
              <!-- /.card-header -->
              <form role="form">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="invoice_no">Invoice NO</label>
                        <input
                          v-model="form.invoice_no"
                          type="text"
                          class="form-control"
                          id="invoice_no"
                          placeholder="Enter Invoice No"
                          :class="{ 'is-invalid': form.errors.has('invoice_no') }"
                        >
                        <has-error :form="form" field="invoice_no"></has-error>
                      </div>
                      <div class="form-group">
                        <label for="invoice_date">Date</label>
                        <datepicker
                          v-model="form.invoice_date"
                          input-class="form-control"
                          format="yyyy-MM-dd"
                          :class="{ 'is-invalid': form.errors.has('invoice_date') }"
                        ></datepicker>
                        <has-error :form="form" field="invoice_date"></has-error>
                      </div>
                      <div class="form-group">
                        <label for="expense_category">Expense Category</label>
                        <select
                          v-model="form.expense_category"
                          name="expense_category"
                          class="form-control"
                          :class="{ 'is-invalid': form.errors.has('expense_category') }"
                        >
                          <option value>--Select--</option>
                          <option value="Utilities">Utilities</option>
                        </select>
                        <has-error :form="form" field="expense_category"></has-error>
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea
                          v-model="form.description"
                          class="form-control"
                          id="description"
                          placeholder="Enter Description"
                          rows="2"
                          :class="{ 'is-invalid': form.errors.has('description') }"
                        ></textarea>
                        <has-error :form="form" field="description"></has-error>
                      </div>
                      <div class="form-group">
                        <label for="amount">Amount</label>
                        <input
                          v-model="form.amount"
                          type="number"
                          step="any"
                          class="form-control"
                          id="amount"
                          placeholder="Enter Amount"
                          :class="{ 'is-invalid': form.errors.has('amount') }"
                        >
                        <has-error :form="form" field="amount"></has-error>
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
import Datepicker from "vuejs-datepicker";
export default {
  data() {
    return {
      form: new Form({
        id: "",
        invoice_no: "",
        invoice_date: "",
        expense_category: "",
        description: "",
        amount: ""
      })
    };
  },
  components: {
    Datepicker
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