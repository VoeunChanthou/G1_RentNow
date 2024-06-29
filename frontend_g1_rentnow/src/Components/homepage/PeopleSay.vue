<template>
  <section id="testimonials" class="pb-5">
    <div class="container">
      <h5 class="section-title h1">What people say !</h5>
      <div class="row">
        <!-- Testimonial item -->
        <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="card shadow-lg">
            <div class="card-body text-center">
              <div class="img-container yellow-bg">
                <img class="img-fluid" src="../../assets/userImg.jpg" alt="card image" />
              </div>
              <div class="card-title">
                <h4>Jasmine</h4>
                <p class="card-text">
                  Skilline's school management software helps traditional and online schools manage
                  scheduling.
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- ./Testimonial item -->

        <!-- Testimonial item -->
        <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="card shadow-lg">
            <div class="card-body text-center">
              <div class="img-container blue-bg">
                <img class="img-fluid" src="../../assets/userImg.jpg" alt="card image" />
              </div>
              <div class="card-title">
                <h4>Jasmine</h4>
                <p class="card-text">
                  Skilline's school management software helps traditional and online schools manage
                  scheduling.
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- ./Testimonial item -->

        <!-- Testimonial item -->
        <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="card shadow-lg">
            <div class="card-body text-center">
              <div class="img-container pink-bg">
                <img class="img-fluid" src="../../assets/userImg.jpg" alt="card image" />
              </div>
              <div class="card-title">
                <h4>Jasmine</h4>
                <p class="card-text">
                  Skilline's school management software helps traditional and online schools manage
                  scheduling.
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- ./Testimonial item -->
      </div>
    </div>
  </section>
</template>

<script>
export default {}
</script>

<style>
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');


section {
  padding: 10em 0;
}
.container .row {
  padding: 5em 0;
}

.section-title {
  text-align: center;
  /* margin-bottom: 70px; */
  padding: 0 0 2.5em 0;

}

.card {
  border: none;
  padding: 20px;
  background: white;
}

.card-body {
  text-align: center;
  margin-bottom: 50px;
}

.img-container {
  width: 140px;
  height: 140px;
  border-radius: 50%;
  display: inline-block;
  position: relative;
  margin-bottom: 20px;
}

.img-container img {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  position: absolute;
  top: -6em;
  left: 10px;
  box-shadow: 0 4px 8px #722cb397;
}


.card-title {
  color: #333;
  font-size: 22px;
  font-weight: bold;
}

.card-text {
  color: #555;
  font-size: 16px;
}

.card-title::after{
  content: '”';
  font-size: 50px;
  color: #691ba5;
  position: absolute;
  right: 40px;
  font-family: Georgia, serif;
}

.card-title::before {
  content: '“';
  font-size: 50px;
  color: #691ba5;
  position: absolute;
  left: 40px;
  top: 180px;
  font-family: Georgia, serif;
}

</style>
