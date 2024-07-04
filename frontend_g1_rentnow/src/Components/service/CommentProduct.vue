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
      <form @submit.prevent="createcomment">
      <div class="modal-body">
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Comment:</label>
            <textarea class="form-control" id="message-text" v-model="comments.comment"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info w-100">Send Comment</button>
        </div>
      </form>
    </div>
  </div>
</div>
</template>
<script>
import axiosInstance from '@/plugins/axios'
import LoadingView from "../../Components/loading/LoadingPopup.vue"
export default {
  components :{
    LoadingView
  },
  name : "App",
  data (){
    return {
      loading : null,
      comments : {
        comment: '',
        product_id : this.$route.params.id,
      }
    }
  },
  methods :{
    async createcomment() {
      try {
         this.loading = true;
        const response = await axiosInstance.post( '/comment', this.comments );
        this.loading = false;
        this.comments.comment = ""
      } catch (error) {
        console.error("Error creating category:", error);
      }
    },

  }
}

</script>
