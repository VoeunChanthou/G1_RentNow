<template>
  <div class="main">
     <LoadingVies v-if="!CommentList.data" />
     <div v-for="comment in CommentList.data" :key="comment" class="px-5">
         <!-- <div class="row justify-content-center mb-3">
           <div class="col-md-12 col-xl-11">
             <div class="card shadow-0 border rounded-3">
               <div>
                 <div class="row">
                   <div class="col-md-8 col-lg-8 col-xl-10">
                    <div class="d-flex align-items-center">
                    <div class="avatar me-3">
                            <img class="avatar-img rounded-circle shadow m-2" src="../../assets/3135715.png" alt="avatar" height="70">
							</div>
                    <div class="card-body">
                        <h5>{{comment.user.first_name}} {{comment.user.last_name}}</h5>
                        <span>{{comment.user.email}}</span>
                    </div>
                    </div>
                    <div class="card-footer">
                        <p class="text-truncate mb-4 mb-md-0 " style="font-size: 20px;">
                          {{comment.comment}}
                        </p>
                    </div>
                   </div>
                   <div class="col-md-3 col-lg-3 col-xl-2 border-sm-start-none border-start">
                     <div class="d-flex flex-row align-items-center mb-1">
                        <div class="d-flex flex-row">
                       <div class="text-danger mb-1 me-2">
                         <i class="fa fa-star"></i>
                         <i class="fa fa-star"></i>
                         <i class="fa fa-star"></i>
                         <i class="fa fa-star"></i>
                         
                       </div>
                       <span>310</span>
                     </div>
                     </div>
                     <h6 class="text-success">Free shipping</h6>
                     
                   </div>
                 </div>
               </div>
             </div>
           </div> -->
         <!-- </div> -->
         

      <div class="card mb-3">
          <div class="card-body">
            <div class="d-flex flex-start">
              <img class="rounded-circle shadow-1-strong me-3"
                :src="comment.user.profile" alt="avatar" width="40"
                height="40" />
              <div class="w-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h6 class="text-black fw-bold mb-0">
                    {{ comment.user.first_name }} {{ comment.user.last_name }} <br>
                    <span class="text-primary" style="font-size: 12px;">{{ comment.user.email }}</span>
                  </h6>
                  <p class="mb-0">2 days ago</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <!-- <p class="small mb-0" style="color: #aaa;">
                    <a href="#!" class="link-grey">Remove</a> •
                    <a href="#!" class="link-grey">Reply</a> •
                    <a href="#!" class="link-grey">Translate</a>
                  </p> -->
                  <span class="text-body ms-2">{{ comment.comment }}</span>
                  <div class="d-flex flex-row">
                    <i class="fas fa-star text-warning me-2"></i>
                    <i class="far fa-check-circle" style="color: #aaa;"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


</div>
</div>
</template>
<script>
import LoadingVies from "../loading/LoadingView.vue"
import axiosInstance from '@/plugins/axios'
export default {
    components: {
        LoadingVies
    },
    props: ['id'],
    data () {
        return  {
            CommentList : []
        }
    },
    mounted() {
    this.fetchComments()
  },
    // created () {
    //     this.fetchComments()
    // },
    methods: {
        async fetchComments () {
            try {
                const response = await axiosInstance.get('list/comment/'+ this.$route.params.id)
                this.CommentList = response.data
            } catch (error) {
                console.error(error)
            }
        }
    }
}
</script>


