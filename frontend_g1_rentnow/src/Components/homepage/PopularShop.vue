<template>
  <div class="px-5" >
    <h2>Popular Shop</h2>
    <div class="row">
      <!-- <template> -->
        <div v-for="(item, indext) in items" :key="indext" class="col-md-4">
          <div class="content">
            <a href="#">
              <div class="content-overlay"></div>
              <img class="content-image" src="../../assets/btbShop.jpg" />
              <div class="content-details fadeIn-bottom">
                <h3 class="content-title">Battambong</h3>
                <button type="button" class="btn"><b> Visit Shop</b></button>
              </div>
            </a>
          </div>
        </div>
      <!-- </template> -->

    </div>
  </div>
</template>
  
  <script>
export default {
    data(){
        return {
           items: [1, 1, 1]
           
        }
    }
}
</script>
  <style scoped >
@import url(https://fonts.googleapis.com/css?family=Raleway);
body {
  background: #f9f9f9;
  /* font-family: 'Raleway', sans-serif; */
}

/* .contents {
  padding: 50px;
} */

.px-5 h2 {
  text-align: center;
  margin-bottom: 10px;
  margin: 50px 0;
}
.content {
  position: relative;
  width: 90%;
  /* max-width: 400px; */
  margin: auto;
  overflow: hidden;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.427);
  border-radius: 20px;
}
.content .content-overlay {
  background: rgba(0, 0, 0, 0.7);
  position: absolute;
  border-radius: 20px;
  /* height: 99%;
  width: 100%; */
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
  height: 400px;
}
img {
  box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.1);
  border-radius: 20px;
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
  justify-content: space-around;
}

.btn {
  background: #ffd800;
  padding: 10px;
  border-radius: 20px;
  width: 200px;
  color: white;
}
</style>