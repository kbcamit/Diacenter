<template>
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
          <h5 class="modal-title" id="exampleModalLabel">Doctor Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="custom-img-header">
            <img src="/Admin.png" alt="Image" class="img-circle" style="height: 60px; width: 60px">
          </div>
          <hr>
          <div>
            <ul class="list-group">
              <li class="list-group-item">
                <strong>Name:</strong>
                {{ viewDoctor.name }}
              </li>
              <li class="list-group-item">
                <strong>Email:</strong>
                {{ viewDoctor.email }}
              </li>
              <li class="list-group-item">
                <strong>Father Name:</strong>
                {{ viewDoctor.father_name }}
              </li>
              <li class="list-group-item">
                <strong>Mother Name:</strong>
                {{ viewDoctor.mother_name }}
              </li>
              <li class="list-group-item">
                <strong>Date of Birth:</strong>
                {{ viewDoctor.dob }}
              </li>
              <li class="list-group-item">
                <strong>Designation:</strong>
                {{ viewDoctor.designation }}
              </li>
              <li class="list-group-item">
                <strong>Mobile:</strong>
                {{ viewDoctor.mobile }}
              </li>
              <li class="list-group-item">
                <strong>Contact Address:</strong>
                {{ viewDoctor.contact_address }}
              </li>
              <li class="list-group-item">
                <strong>Join Date:</strong>
                {{ viewDoctor.join_date }}
              </li>
            </ul>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["viewDoctor"]
};
</script>

<style scoped>
.custom-img-header {
  text-align: center;
}
</style>