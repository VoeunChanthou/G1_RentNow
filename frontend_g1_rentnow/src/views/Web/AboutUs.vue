<template>
  <!-- <div class="container">
      <img src="../../assets/contactUs.jpg" class="img-rounded rounded mx-auto bg-warning" style="width:100%" alt="Cinque Terre"  height="550">
      <h6>Why buy if you can rant?</h6>
  </div> -->
  <div class="px-5 py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <img
            src="../../assets/contactUs.jpg"
            class="mainImg img-rounded rounded mx-auto bg-warning"
            style="width: 100%"
            alt="Cinque Terre"
            height="550"
          />
          <h2 style="position: absolute; top: 100px; left: 65%; text-align: end; font-weight: bold">
            Why <span style="color: #c49be9; font-weight: bold">Buy</span> If You Can Rant? <br />
            Contact Us <span style="color: #f4e065; font-weight: bold">NOW!</span>
          </h2>
          <!-- <h2 style="position: absolute; top: 140px; left: 75%">Contact Us Now!</h2> -->
        </div>
        <div>
          <div class="content mt-5" style="width: 100%; display: flex; justify-content: center">
            <h2 class="about" style="font-weight: bold">About Us</h2>
          </div>

          <span
            >RentMe is a website that allows us to rent all kinds of things that can provide
            convenience, for those who travel far away without having to spend a lot of money to
            things that they need to use temporarily. Other Users of this website can also easily
            access the details of one thing which they want to rent. On the other hand, for those
            who want to put something for rent.</span
          >
        </div>
        <div>
          <div class="content mt-5" style="width: 100%; display: flex; justify-content: center">
            <h2 class="about" style="font-weight: bold">Why RentMe?</h2>
          </div>

          <span
            >RentMe has many benefits for all users who use​websites ​such as easily to borrow items
            like bikes, motorcycles, cars, and book online or something else, essentially giving you
            greater options, saving money by borrowing is cheaper than buying, you don’t need to
            spend a lot of money and borrowing is made simple with the app, saving you time, save
            time with the app’s easy borrowing process, many choices: You can borrow different
            things that you might not be able to buy.</span
          >
        </div>
        <div>
          <div class="content mt-5" style="width: 100%; display: flex; justify-content: center">
            <h2 class="about" style="font-weight: bold">Get In Touch</h2>
          </div>
          <span
            >We are dedicated to advising you on services offered by RentMe. Contact us, to get some
            materials that you want to rent and get more information.</span
          >

          <div
            class="py-3 mt-5"
            style="display: flex; justify-content: space-around; align-items: center"
          >
            <div
              class="card"
              style="
                width: 260px;
                height: 180px;
                background: linear-gradient(120deg, #c49be9 40%, #f4e065);
                border-radius: 15px;
              "
            >
              <div class="card-body text-center">
                <img
                  src="../../assets/telegtam.png"
                  class="img-rounded rounded mx-auto hover-shadow"
                  style="width: 60"
                  alt="Cinque Terre Hollywood Sign on The Hill"
                  height="60"
                />
                <h4 class="card-title"><B>Messenger</B></h4>
                <p class="card-text">RentMe</p>
              </div>
            </div>
            <div
              class="card"
              style="
                width: 260px;
                height: 180px;
                background: linear-gradient(120deg, #c49be9 30%, #f4e065);
                border-radius: 15px;
              "
            >
              <div class="card-body text-center">
                <img
                  src="../../assets/phone.png"
                  class="img-rounded rounded mx-auto"
                  style="width: 60"
                  alt="Cinque Terre"
                  height="60"
                />
                <h4 class="card-title"><b>Phone Number</b></h4>
                <p class="card-text">
                  (+885) 15 345 234 <br />
                  (+885) 12 738 028
                </p>
              </div>
            </div>
            <div
              class="card"
              style="
                width: 260px;
                height: 180px;
                background: linear-gradient(120deg, #c49be9 30%, #f4e065);
                border-radius: 15px;
              "
            >
              <div class="card-body text-center">
                <img
                  src="../../assets/email1.png"
                  class="img-rounded rounded mx-auto"
                  style="width: 140"
                  alt="Cinque Terre"
                  height="50"
                />
                <h4 class="card-title"><b>Email</b></h4>
                <p class="card-text">rentnow@gmail.com.kh</p>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div class="content mt-5" style="width: 100%; display: flex; justify-content: center">
            <h2 class="about" style="font-weight: bold">Map</h2>
          </div>
          <GMapAutocomplete
            placeholder="This is a placeholder"
            @place_changed="setPlace"
            style="font-size: large"
          ></GMapAutocomplete>
          <GMapMap :center="mapCenter" :zoom="mapZoom" style="width: 100%; height: 500px">
            <GMapMarker :position="markerPosition" />
          </GMapMap>
        </div>
        
      </div>
    </div>
  </div>
</template>


<script>
export default {
  name: 'App',
  data() {
    return {
      mapCenter: { lat: 6.465422, lng: 3.406448 }, // Initial center
      mapZoom: 7, // Initial zoom level
      markerPosition: null // Marker position will be set based on searched location
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
  color: #c49be9;
}

.about:hover {
  color: #f4e065;
}

.mainImg {
  box-shadow: 5px 10px #e8e8e8;
}
.btn {
  color: #0095ff;
  background-color: #fff;
}
</style>