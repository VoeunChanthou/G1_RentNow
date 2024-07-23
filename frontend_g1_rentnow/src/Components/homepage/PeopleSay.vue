<template>
  <div class="container">
    <h2><B>WHAT PEOPLE SAYS !!</B></h2>
    <div class="row g-2">
      <div class="col-md-4">
        <div class="card p-3 text-center px-4">
          <div class="user-image">
            <img src="https://i.imgur.com/PKHvlRS.jpg" class="rounded-circle" width="80" />
          </div>

          <div class="user-content">
            <h5 class="mb-0">Bruce Hardy</h5>
            <!-- <span>Software Developer</span> -->
            <p>
              "Renting a bike for my weekend adventures has never been easier. 
              Rent Now offers a great selection, and their customer service is exceptional. 
              I love the flexibility and the seamless booking experience!"
            </p>
          </div>

          <div class="ratings">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card p-3 text-center px-4">
          <div class="user-image">
            <img src="https://i.imgur.com/w2CKRB9.jpg" class="rounded-circle" width="80" />
          </div>

          <div class="user-content">
            <h5 class="mb-0">Mark Smith</h5>
            <!-- <span>Web Developer</span> -->
            <p>
              "I rented a motorcycle for a spontaneous road trip and it was an incredible experience. 
              The bike was in perfect condition, and the staff at Rent Now 
              made sure I had all the gear I needed. Highly recommended!"
            </p>
          </div>

          <div class="ratings">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card p-3 text-center px-4">
          <div class="user-image">
            <img src="https://i.imgur.com/ACeArwY.jpg" class="rounded-circle" width="80" />
          </div>

          <div class="user-content">
            <h5 class="mb-0">Veera Duncan</h5>
            <!-- <span>Software Architect</span> -->
            <p>
              "I needed a reliable car for a business trip and Rent Now delivered. 
              The car was clean, well-maintained, and the pickup and drop-off process was quick and easy. 
              I'll be using their services again for sure!"
            </p>
          </div>

          <div class="ratings">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script scoped>
// import { Icon } from '@iconify/vue'
// export default {}
// Icon
</script>

<style scoped>
.container h2{
  display: flex;
  align-items: center;
  justify-content: center;
  /* padding: 100px 0 20px 0; */
  margin-top: 25px;
  margin-bottom: 55px;
  color: #722cb3;
}
.card {
  border: none;
  box-shadow:  2px 2px 2px 2px rgba(0, 0, 0, 0.1);
}

.user-content p {
  margin-top: 5px;
  font-size: 12px;
}

.ratings i {
  color: blue;
}
</style>
