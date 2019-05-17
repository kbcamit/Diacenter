<template>
  <div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Doctor</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active">Add Doctor</li>
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
                <h3 class="card-title">Add Doctor</h3>
                <div class="card-tools">
                  <router-link to="/view-doctor" class="btn btn-primary">View Doctor</router-link>
                </div>
              </div>
              <!-- /.card-header -->
              <form role="form" @submit.prevent="createDoctor">
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
                          placeholder="Enter name"
                          :class="{ 'is-invalid': form.errors.has('name') }"
                        >
                        <has-error :form="form" field="name"></has-error>
                      </div>
                      <div class="form-group">
                        <label for="father_name">Father Name</label>
                        <input
                          v-model="form.father_name"
                          type="text"
                          class="form-control"
                          id="father_name"
                          placeholder="Enter Father Name"
                          :class="{ 'is-invalid': form.errors.has('father_name') }"
                        >
                        <has-error :form="form" field="father_name"></has-error>
                      </div>
                      <div class="form-group">
                        <label for="mother_name">Mother Name</label>
                        <input
                          v-model="form.mother_name"
                          type="text"
                          class="form-control"
                          id="mother_name"
                          placeholder="Enter Mother Name"
                          :class="{ 'is-invalid': form.errors.has('mother_name') }"
                        >
                        <has-error :form="form" field="name"></has-error>
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input
                          v-model="form.email"
                          type="email"
                          class="form-control"
                          id="email"
                          placeholder="Enter email"
                          :class="{ 'is-invalid': form.errors.has('email') }"
                        >
                        <has-error :form="form" field="email"></has-error>
                      </div>
                      <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <datepicker
                          v-model="form.dob"
                          input-class="form-control"
                          format="yyyy-MM-dd"
                          :class="{ 'is-invalid': form.errors.has('dob') }"
                        ></datepicker>
                        <has-error :form="form" field="dob"></has-error>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="image">Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id>Upload</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="mobile">Mobile No</label>
                        <input
                          v-model="form.mobile"
                          type="text"
                          class="form-control"
                          id="mobile"
                          placeholder="Enter Mobile No"
                          :class="{ 'is-invalid': form.errors.has('mobile') }"
                        >
                        <has-error :form="form" field="mobile"></has-error>
                      </div>
                      <div class="form-group">
                        <label for="contact_address">Contact Address</label>
                        <textarea
                          v-model="form.contact_address"
                          class="form-control"
                          id="contact_address"
                          placeholder="Enter Contact Address"
                          rows="1"
                          :class="{ 'is-invalid': form.errors.has('contact_address') }"
                        ></textarea>
                        <has-error :form="form" field="contact_address"></has-error>
                      </div>
                      <div class="form-group">
                        <label for="designation">Designation</label>
                        <input
                          v-model="form.designation"
                          type="text"
                          class="form-control"
                          id="designation"
                          placeholder="Enter Designation"
                          :class="{ 'is-invalid': form.errors.has('designation') }"
                        >
                        <has-error :form="form" field="mobile"></has-error>
                      </div>
                      <div class="form-group">
                        <label for="join_date">Join Date</label>
                        <datepicker
                          v-model="form.join_date"
                          input-class="form-control"
                          format="yyyy-MM-dd"
                          :class="{ 'is-invalid': form.errors.has('join_date') }"
                        ></datepicker>
                        <has-error :form="form" field="join_date"></has-error>
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
import { setInterval } from "timers";
export default {
  name: "add-doctor",
  data() {
    return {
      form: new Form({
        id: "",
        name: "",
        email: "",
        father_name: "",
        mother_name: "",
        dob: "",
        image: "",
        mobile: "",
        contact_address: "",
        designation: "",
        join_date: "",
        status: ""
      })
    };
  },
  components: {
    Datepicker
  },
  methods: {
    createDoctor() {
      this.$Progress.start();
      this.form
        .post("api/doctor")
        .then(() => {
          Toast.fire({
            type: "success",
            title: "Doctor created successfully"
          });
          this.$Progress.finish();
          this.$router.push("/view-doctor");
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

<style scoped>
</style>