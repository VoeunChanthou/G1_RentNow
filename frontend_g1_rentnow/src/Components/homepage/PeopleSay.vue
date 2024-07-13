z<template>
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
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
              exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
              exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
              exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
