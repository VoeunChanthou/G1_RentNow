<template>
  <div  class="container">
    <h2 class="h2"><b>POPULAR SHOP</b></h2>
    <div class="row" v-if="!items">
      <LoadingShop/>
    </div>
    <div class="row" v-if="items">
        <div v-for="(item, indext) in items" :key="indext" class="col-4">
          <div class="content">
            <a :href="`/shop/${item.id}`">
              <div class="content-overlay"></div>
              <img class="content-image" :src="item.image" />
              <div class="content-details fadeIn-bottom">
                <h3 class="content-title">{{ item.name }}</h3>
                <button type="button" class="btn"><b> Visit Shop</b></button>
              </div>
            </a>
          </div>
          <div class="popular-shop-detail">
            <h3>{{ item.name }}</h3>
            <p>{{ item.description }}</p>
          </div>
        </div>
    </div>
  </div>
</template>
  
  <script>
import axiosInstance from '@/plugins/axios'
import LoadingShop from '@/Components/loading/LoadingShop.vue'



export default {
  components: {LoadingShop},
    data(){
        return {
           items: null
           
        }
    },
    async created(){
      const data = await axiosInstance.get('/shop')
      // console.log(this.items.data.data);
      this.items = data.data.data;
  
      
    }
}
</script>
  <style scoped >
@import url(https://fonts.googleapis.com/css?family=Raleway);

.container {
  /* background-color: gainsboro; */
  display: flex;
  flex-direction: column;
  justify-content: space-between;

}
 .h2 {
  margin: 50px 0px 100px 0px;
  color: #691BA5;
}

.popular-shop-detail{
  display: flex;
  flex-direction: column;
  padding: 20px;

}

.content {
  position: relative;
  width: 90%;
  margin: auto;
  overflow: hidden;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.427);
}
.content .content-overlay {
  background: rgba(0, 0, 0, 0.7);
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  right: 0;
  opacity: 0;
  -webkit-transition: all 0.4s ease-in-out 0s;
  -moz-transition: all 0.4s ease-in-out 0s;
  transition: all 0.4s ease-in-out 0s;
}
.content:hover .content-overlay {
  opacity: 1;
}
.content-image {
  width: 100%;
  height: 300px;
}
img {
  box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.1);
}
.content-details {
  position: absolute;
  text-align: center;
  padding-left: 1em;
  padding-right: 1em;
  width: 100%;
  top: 50%;
  left: 50%;
  opacity: 0;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  -webkit-transition: all 0.3s ease-in-out 0s;
  -moz-transition: all 0.3s ease-in-out 0s;
  transition: all 0.3s ease-in-out 0s;
}
.content:hover .content-details {
  top: 50%;
  left: 50%;
  opacity: 1;
}
.content-details h3 {
  color: #fff;
  font-weight: 500;
  letter-spacing: 0.15em;
  margin-bottom: 0.5em;
  text-transform: uppercase;
}
.content-details p {
  color: #fff;
  font-size: 0.8em;
}
.fadeIn-bottom {
  top: 80%;
}

.row {
  display: flex;
  justify-content: space-evenly;
}

.btn {
  background: #ffd800;
  padding: 10px;
  border-radius: 20px;
  width: 200px;
  color: white;
}
</style>