<template>
<div class="modal fade" id="formfeedback" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class=" d-flex justify-content-center h-100" v-if="loading">
  <LoadingView />     
    </div>
    <div class="modal-content" style="border:2px solid yellow;" v-if="loading == null || loading == false">
      <div class="modal-header" style="background: linear-gradient(90deg, #722CB3 30%, #C49BE9);  ">
        <h5 class="modal-title text-white" id="exampleModalLabel" >Comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form >
      <div class="modal-body">
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Comment:</label>
            <textarea class="form-control" id="message-text" v-model="comments.comment"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button v-if=" ConditionComment " type="button" class="btn btn-info w-100 " @click="this.$emit('createcomment',comments)"  data-bs-dismiss="modal" aria-label="Close">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>
</template>
<script>
export default {
  data (){
    return {
      loading : null,
      comments : {
        comment: '',
        product_id : this.$route.params.id,
      }
    }
  },
  computed :{
    ConditionComment (){
      if (this.comments.comment.length > 0) {
        return true;
      }
    }
  }

}
</script>
