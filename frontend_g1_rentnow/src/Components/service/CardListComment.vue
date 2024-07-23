<template>
  <div class="main">
     <LoadingVies v-if="!Comments.data" />
     <div v-for="comment in Comments.data" :key="comment">
         <div class="row justify-content-center mb-3">
           <div class="col-md-12 col-xl-11">
             <div class="card shadow-0 border rounded-3">
               <div>
                 <div class="row">
                   <div>
                    <div class="d-flex align-items-center">
                    <div class="avatar me-3">
                            <img v-if="comment.user.profile != null" class="avatar-img rounded-circle shadow m-2" :src="comment.user.profile" alt="avatar" height="50">
                            <img v-else class="avatar-img rounded-circle shadow m-2" src="../../assets/3135715.png" alt="avatar" height="50">
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div>
                          <h5>{{comment.user.first_name}} {{comment.user.last_name}}</h5>
                          <span>{{comment.user.email}}</span>
                        </div>
                        <div class="dropdown" v-if="comment.user.email == AuthUSer.user.email">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">More</a>
                            <ul class="dropdown-menu p-2" aria-labelledby="dropdownMenuLink">
                              <li><button class="btn btn-info w-100 " @click="this.$emit('updatecomment',comment.id)" data-bs-toggle="modal" data-bs-target="#UpdateComment" data-bs-whatever="@getbootstrap" style="margin-bottom: 9px;">Edit</button></li>
                              <li><button class="btn btn-danger w-100" @click="this.$emit('deletecomment',comment.id)">Delete</button></li>
                            </ul>
                      </div>
                      </div>
                    </div>
                    </div>
                    <div class="card-footer">
                        <p class="text-truncate mb-4 mb-md-0 " style="font-size: 20px;">
                          {{comment.comment}}
                        </p>
                    </div>
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
import {useAuthStore} from '@/stores/auth-store.ts'
export default {
    components: {
        LoadingVies,
      },
      data (){
        return{
        AuthUSer : useAuthStore()

      }
    },
    props: ['Comments']
}
</script>