<template></template>

<script>
export default {
  name: "edit-doctor",
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