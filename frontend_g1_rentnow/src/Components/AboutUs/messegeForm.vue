<template>
    <div class="container mt-5" style="border-radius: 1px; background-color: #ffff; z-index: 3; margin-bottom: 50px">
        <div class="d-flex flex-column" style="width: 100%">
            <form action="" class="d-flex justify-content-spece-between ">
                <img src="../../assets/99aae0fc307961ad95c2a253867e8f9b.jpg" alt="" style="width: 47%; height: 480px;">
                <div class="row mt-5 " style="margin-right: 25px;">
                    <div class="content mt-3" style="width: 100%; display: flex; justify-content: center">
                        <h4 class="comment" style="font-weight: bold">START A CONVERSATION</h4>
                    </div>
                    <div class="" style="width: 100; display: flex; justify-content: space-between;">
                        <div class="mt-3" style="width: 45%;">
                          <label htmlFor="defaultFirstName" class="text-muted">First Name </label>
                          <input type="text" placeholder="First name"  id="defaultFirstName" v-model="users.FirstName" class="form-control"/>
                          <p class="mt-2">Your First Name is: {{ users.FirstName }}</p>
                        </div>
                        <div class="mt-3" style="width: 45%;">
                          <label htmlFor="defaultLastname" class="text-muted"> Last Name </label>
                          <input type="text" placeholder="last name" id="defaultLastname" v-model="users.LastName" class="form-control"/>
                          <p class="mt-2">Your Last Name is: {{ users.LastName }}</p>
                          
                        </div>
                 
                    </div>
                        <div class="mt-3">
                            <label htmlFor="email" class="text-muted"> Email </label>
                            <input type="email" placeholder="Email" id="email" class="form-control" v-model.trim="users.Email"/>
                            <p class="mt-2">Your Email is: {{ users.Email }}</p>
                        </div>
                        <div class="mt-3">
                          <label htmlFor="email" class="text-muted"> Comment </label>
                          <textarea name="text" placeholder="Write your comment here" class="form-control" v-model="users.Comment" id=""></textarea>
                          <div class="group" style="width: 100%; display: flex; justify-content: center; align-items: center;" >
                            <button type="submit" style="width: 20%; " class="btn btn-warning btn-block mt-4" @click="submitComment">Sent</button>
                          </div>
                    </div>
                    <div class="text-center mt-3">
                        <p>Not a member? <a href="#!">Register</a></p>
                        <p>or sign up with:</p>
                        <button  data-mdb-ripple-init type="button" class="btn btn-floating mx-1">
                          <i class="fab fa-facebook-f"></i>
                        </button>

            <button data-mdb-ripple-init type="button" class="btn btn-floating mx-1">
              <i class="fab fa-google"></i>
            </button>

            <button data-mdb-ripple-init type="button" class="btn btn-floating mx-1">
              <i class="fab fa-twitter"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { date } from 'yup';
import { Icon } from '@iconify/vue'
import axiosInstance from '@/plugins/axios'
import { useAuthStore } from '@/stores/auth-store.ts'
import router from '@/router';

export default {
  data() {
    return {
      users: {
        user_id: useAuthStore().user.id,
        first_name: '',
        last_name: '',
        email: '',
        comment: '',
      },
    };
  },

  mounted() {
  },

  methods: {
    submitComment() {
      try {
        axiosInstance.post('/comment', this.users);
             this.users.first_name = ''
             this.users.last_name = ''
             this.users.email = ''
             this.users.comment = ''
             alert('Your message has been sent')
          } catch {
        console.log('Failed to send comment')
       
      }  
    },
    
  }
}
</script>

<style>
.comment {
  color: #691BA5;
}

.comment:hover {
  color: #FFD800;

}
.btn {
  color: #0095ff;
  background-color: #fff;
}

</style>