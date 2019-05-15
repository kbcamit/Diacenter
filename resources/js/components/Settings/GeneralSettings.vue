<template>
  <div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">General Settings</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active">Update Settings</li>
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
                <h3 class="card-title">Update General Settings</h3>
              </div>
              <!-- /.card-header -->
              <form role="form">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input
                          v-model="form.name"
                          type="text"
                          class="form-control"
                          id="name"
                          placeholder="Enter Name"
                          :class="{ 'is-invalid': form.errors.has('name') }"
                        >
                        <has-error :form="form" field="name"></has-error>
                      </div>
                      <div class="form-group">
                        <label for="address">Address</label>
                        <textarea
                          v-model="form.address"
                          class="form-control"
                          id="address"
                          placeholder="Enter Address"
                          rows="2"
                          :class="{ 'is-invalid': form.errors.has('address') }"
                        ></textarea>
                        <has-error :form="form" field="address"></has-error>
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input
                          v-model="form.name"
                          type="email"
                          class="form-control"
                          id="email"
                          placeholder="Enter Email"
                          :class="{ 'is-invalid': form.errors.has('email') }"
                        >
                        <has-error :form="form" field="email"></has-error>
                      </div>
                      <div class="form-group">
                        <label for="phone_no">Phone No</label>
                        <input
                          v-model="form.phone_no"
                          type="text"
                          class="form-control"
                          id="phone_no"
                          placeholder="Enter Phone No"
                          :class="{ 'is-invalid': form.errors.has('phone_no') }"
                        >
                        <has-error :form="form" field="phone_no"></has-error>
                      </div>
                      <div class="form-group">
                        <label for="logo">Logo</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="logo">
                            <label class="custom-file-label" for="logo">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id>Upload</span>
                          </div>
                        </div>
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
        name: "",
        email: "",
        address: "",
        phone_no: "",
        logo: ""
      })
    };
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
