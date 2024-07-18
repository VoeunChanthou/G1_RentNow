<template>
    <div class="modal fade" id="UpdateComment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class=" d-flex justify-content-center h-100" >
  <LoadingView />     
    </div>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" >Comment Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form >
      <div class="modal-body">
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Update:</label>
            <textarea class="form-control" id="message-text" v-model = "massageUpdate" ></textarea>
            <span class="text-info m-2">Old Comment : {{ massage }}</span>
          </div>
        </div>
        <div class="modal-footer">
          <button  type="button" class="btn btn-danger w-100 " @click="this.$emit('updatecomment',massageUpdate)"   data-bs-dismiss="modal" aria-label="Close">Update Comment</button>
        </div>
      </form>
    </div>
  </div>
</div>
</template>
<script >
export default {
  props : ['massage'],
  data() {
    return {
      massageUpdate : null
    }
  },
  computed : {
    massage() {
      return this.massageUpdate = this.massage
    }

  }
}

</script>