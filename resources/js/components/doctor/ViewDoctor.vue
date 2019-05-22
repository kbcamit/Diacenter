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
              <li class="breadcrumb-item active">View Doctor</li>
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
                <h3 class="card-title">All Doctors</h3>
                <div class="card-tools">
                  <router-link to="/add-doctor" class="btn btn-primary">Add Doctor</router-link>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>SL No</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Designation</th>
                      <th>Mobile</th>
                      <th>Contact Address</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(doctor, index) in doctors.data" :key="doctor.id">
                      <td>{{ index + 1 }}</td>
                      <td>
                        <img src alt="Demo Image" class="img img-circle">
                      </td>
                      <td>{{ doctor.name }}</td>
                      <td>{{ doctor.email }}</td>
                      <td>{{ doctor.designation }}</td>
                      <td>{{ doctor.mobile }}</td>
                      <td>{{ doctor.contact_address }}</td>
                      <td>
                        <button
                          type="button"
                          class="btn btn-primary btn-xs"
                          data-toggle="tooltip"
                          data-plcaement="top"
                          @click="doctorProfile(doctor)"
                          data-original-title="View"
                        >
                          <i class="fa fa-eye"></i>
                        </button>
                        <router-link
                          :to="`/edit-doctor/${doctor.id}`"
                          href="#"
                          class="btn btn-primary btn-xs"
                          data-toggle="tooltip"
                          data-plcaement="top"
                          data-original-title="Edit"
                        >
                          <i class="fa fa-edit"></i>
                        </router-link>
                        <a
                          href="#"
                          class="btn btn-danger btn-xs"
                          data-toggle="tooltip"
                          data-plcaement="top"
                          @click="deleteDoctor(doctor.id)"
                          data-original-title="Delete"
                        >
                          <i class="fa fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="custom-paginate">
                  <pagination :data="doctors" @pagination-change-page="getResults"></pagination>
                </div>
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
    <DoctorProfile :viewDoctor="viewDoctor"/>
  </div>
</template>

<script>
import DoctorProfile from "./DoctorProfile";
export default {
  name: "view-doctor",
  data() {
    return {
      doctors: {},
      viewDoctor: {}
    };
  },
  components: {
    DoctorProfile
  },
  methods: {
    getAllDoctors() {
      axios("api/doctor")
        .then(res => {
          this.doctors = res.data;
        })
        .catch(err => console.log(err.response.data));
    },
    getResults(page = 1) {
      axios.get("api/doctor?page=" + page).then(res => {
        this.doctors = res.data;
      });
    },
    deleteDoctor(doctorId) {
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
          axios
            .delete("api/doctor/" + doctorId)
            .then(() => {
              Swal.fire("Deleted!", "Doctor has been deleted.", "success");
              Fire.$emit("AfterResult");
            })
            .catch(() => {
              Swal.fire("", "Something wrong", "warning");
            });
        }
      });
    },
    doctorProfile(doctor) {
      this.viewDoctor = doctor;
      $("#exampleModal").modal("show");
    }
  },
  mounted() {
    //  [App.vue specific] When App.vue is finish loading finish the progress bar
    this.$Progress.finish();
  },
  created() {
    this.getAllDoctors();

    Fire.$on("AfterResult", () => {
      this.getAllDoctors();
    });

    //  [App.vue specific] When App.vue is first loaded start the progress bar
    this.$Progress.start();
  }
};
</script>

<style scoped>
</style>