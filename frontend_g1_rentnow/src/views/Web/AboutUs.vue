<template>
  <WebLayout>
    <div class="col-md-12 ">
      <img
        src="../../assets/contactUs.jpg"
        class="mainImg img-rounded rounded mx-auto bg-warning"
        style="width: 100%"
        alt="Cinque Terre"
        height="650"
      />
      <h1 class="caption" style="position: absolute; top: 300px; left: 60%; text-align: end; font-weight: bold">
        Why <span style="color: #691BA5; font-weight: bold">Buy</span> If You Can Rant? <br />
        Contact Us <span style="color: #FFD800; font-weight: bold">NOW!</span>
      </h1>
      <!-- <h2 style="position: absolute; top: 140px; left: 75%">Contact Us Now!</h2> -->
    </div>
  <div class="px-5 py-3">
    <div class="container">
      <div class="row">
        <div>
          <div class="d-flex justify-content-spece-between mt-15">
            <div class=" mr-5" style="width: 35%;">
              <div class="image-hover-effect mr-20 mt-5">
                <img src="../../assets/140bcad4fc8ce3d82ccd6ee20a478e1a.jpg" class="img-fluid" alt="Image" style="width: 100%; height: 40vh; border-radius: 10px;">
              </div>
            </div>
            <div  style="width: 65%;">
              <div class="content mt-5" style="width: 100%; display: flex; justify-content: center">
                <h2 class="about" style="font-weight: bold">About Us</h2>
              </div>
              <span><b>RentMe</b> is a website that allows us to rent all kinds of things that can provide
              convenience, for those who travel far away without having to spend a lot of money to
              things that they need to use temporarily. Other Users of this website can also easily
              access the details of one thing which they want to rent. On the other hand, for those
              who want to put something for rent.</span>
            </div>
            
          </div>
        </div>
        <div class="mb-35">
          <div class="d-flex justify-content-spece-between mt-20">
            <div  style="width: 65%;">
              <div class="content mt-5" style="width: 100%; display: flex; justify-content: center">
                <h2 class="about" style="font-weight: bold">Why RentMe?</h2>
              </div>
              <span>  <b>RentMe</b> has many benefits for all users who use​websites ​such as easily to borrow items
              like bikes, motorcycles, cars, and book online or something else, essentially giving you
              greater options, saving money by borrowing is cheaper than buying, you don’t need to
              spend a lot of money and borrowing is made simple with the app, saving you time, save
              time with the app’s easy borrowing process, many choices: You can borrow different
              things that you might not be able to buy.</span>
              </div>
              <div class=" ml-18" style="width: 35%;">
                <div class="image-hover-effect mr-20 mt-5">
                  <img src="../../assets/85995c87e9275e1bfb614174038427f5.jpg" class="img-fluid" alt="Image" style="width: 100%; height: 40vh; border-radius: 10px;">
                </div>
              </div>
            
          </div>
        </div>
        
        <div class="shadow mb-10" style="background: #ffff;">
          <div class="content mt-5" style="width: 100%; display: flex; justify-content: center">
            <h2 class="about mb-3" style="font-weight: bold">Get In Touch</h2>
          </div>
          <span style="display: flex; justify-content: center">We are dedicated to advising you on services offered by RentMe. Contact us, to get some
            materials that you want to rent and get more information.</span>

          <div class="py-3 mt-5 mb-10" style="display: flex; justify-content: space-around; align-items: center">
            <div
              class="card shadow"
              style="
                width: 260px;
                height: 180px;
                background: linear-gradient(120deg, #c49be9 40%, #f4e065);
                border-radius: 15px;">
              <div class="card-body text-center ">
                <img src="../../assets/telegtam.png" class="img-rounded rounded" style="width: 60" alt="Cinque Terre Hollywood Sign on The Hill" height="60" />
                <h4 class="card-title"><B>Telegram</B></h4>
                <a href="#" style="text-decoration: none;">RentMe</a>
              </div>
            </div>
            <div class="card shadow" style=" width: 260px; height: 180px; background: linear-gradient(120deg, #c49be9 30%, #f4e065); border-radius: 15px;">
              <div class="card-body text-center">
                <img src="../../assets/phone.png" class="img-rounded rounded mx-auto" style="width: 60" alt="Cinque Terre" height="60"/>
                <h4 class="card-title"><b>Phone Number</b></h4>
                <p class="card-text">
                  (+885) 15 345 234 <br />
                  (+885) 12 738 028 </p>
              </div>
            </div>
            <div
              class="card shadow" style=" width: 260px; height: 180px; background: linear-gradient(120deg, #c49be9 30%, #f4e065); border-radius: 15px;">
              <div class="card-body text-center">
                <img src="../../assets/email1.png" class="img-rounded rounded mx-auto" style="width: 140" alt="Cinque Terre" height="50"/>
                <h4 class="card-title"><b>Email</b></h4>
                <a href="#" style="text-decoration: none;">rentnow@gmail.com.kh</a>
              </div>
            </div>
          </div>
        </div>
      <div class="ratio ratio-16x9 mt-5" style="height: 60vh;">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96714.68291250926!2d-74.05953969406828!3d40.75468158321536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2588f046ee661%3A0xa0b3281fcecc08c!2sManhattan%2C%20Nowy%20Jork%2C%20Stany%20Zjednoczone!5e0!3m2!1spl!2spl!4v1672242259543!5m2!1spl!2spl"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
      <messege-form></messege-form>
      </div>
    </div>
  </div>
  <FooterMenu></FooterMenu>
</WebLayout>
</template>


<script>
import FooterMenu from "@/Components/homepage/FooterMenu.vue";
import messegeForm from "../../Components/AboutUs/messegeForm.vue"
import WebLayout from "../../Components/Layouts/WebLayout.vue"
import { Icon } from '@iconify/vue'
import axiosInstance from '@/plugins/axios'
export default {
  components: { messegeForm, WebLayout, FooterMenu},
  name: 'App',
  data() {
    return {
      mapCenter: { lat: 6.465422, lng: 3.406448 }, // Initial center
      mapZoom: 7, // Initial zoom level
      markerPosition: null,
       // Marker position will be set based on searched location
    }
  },
  methods: {
    setPlace(place) {
      this.markerPosition = {
        lat: place.geometry.location.lat(),
        lng: place.geometry.location.lng()
      }
      this.mapCenter = {
        lat: place.geometry.location.lat(),
        lng: place.geometry.location.lng()
      }
    }
  }
}
</script>

<style>
.about {
  color: #691BA5;
}

.about:hover {
  color: #FFD800;
}

.mainImg {
  box-shadow: 5px 10px #e8e8e8;
}
.mainImg:hover {
  box-shadow: 5px 10px #e8e8e8;
}

.image-hover-effect {
  box-shadow: 5px 5px 5px 5px #e8e8e8;
}
.image-hover-effect:hover {
  box-shadow: 5px 5px 5px 5px #e8e8e8;
  transform: scale(1.05);
}
</style>