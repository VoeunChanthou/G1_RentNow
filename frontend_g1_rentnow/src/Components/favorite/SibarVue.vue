<script>

import axiosInstance from '@/plugins/axios'

// export default {
//   props: ['product'],
//   data() {
//     return {
//       showNewForm: false,
//       isFavorite: false,
//       isFavo: ''
//     }
//   },
// }

</script>

<template>


        <div class="top shadow search-bar shadowp p-3 bg-white rounded" style="height: auto; ">
      <div class="right mt-0" style="width: 100%; height: auto; display: flex; flex-direction: column;">
        <img class="mt-0" src="../../assets/buy.jpg" alt="">
        <h2 class="acc" style="display: flex; justify-content: center;"><b>Account</b></h2>
        <div class="ml-10 mt-3" style="height: auto; gap: 5px;">
          <a class="dropdown-item" style="color: gray;" href="/history"><p>My History</p></a>
          <a class="dropdown-item" style="color: gray;" href="/myborrow/page"><p>My Borrow</p></a>
          <a class="dropdown-item" style="color: gray;" href="/message"><p>Message</p></a>
          <a class="dropdown-item" style="color: gray;" href="/favorite"><p>Favorite List</p></a>
          <a class="dropdown-item" style="color: gray;" href="/my/product"><p>My product</p></a>
          <a class="dropdown-item" style="color: gray;" href="#"><p>Account Settings</p></a>
          <a class="dropdown-item" style="color: gray;" href="/rentDetail"><p>Help</p></a>
          <button class="dropdown-item " style="color: gray;" @click ="onSubmit"><p><b>Sign Out</b></p></button>
        </div>   
        </div>
      </div>
</template>



<style scoped>
a p:hover {
  background: rgb(133, 15, 188); 
  color: rgb(255, 255, 255); padding: 5px;
}
</style>