<template>
    <!-- Vertically centered modal -->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 class="text-danger">Are You Sure For Delete this Story ?! {{ product }}</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalToggle2" @click="$emit(Deletehistory)">Delete</button>
      </div>
    </div>
  </div>
</div>
</template>
<script>
export default {
    props: ['product']
}
</script>