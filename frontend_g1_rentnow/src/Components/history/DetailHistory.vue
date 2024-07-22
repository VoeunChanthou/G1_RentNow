<template>
    
    <div class="offcanvas offcanvas-end" tabindex="-1" id="detailhistory" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"> Detial history</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-header">
        <!-- <h5>Product Owner</h5> -->
        <div class="card ">
          <div class="card-body">
              <div class="row">
                  <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                    <img src="../../assets/3135715.png"
                    class="w-100 rounded-circle" />
                    
                <div class="bg-image hover-zoom ripple rounded ripple-surface">
                  <a href="#!">
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-6 col-lg-5 col-xl-5">
                <h6>{{ DetailProps.name}}</h6>
                <p>{{ DetailProps.Province}}</p>
              </div>
              <div class="col-md-6 col-lg-4 col-xl-4 border-sm-start-none border-start ">
                <div class="d-flex flex-column  ">
                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-sm text-white" type="button" style="background: linear-gradient(90deg, #722CB3 30%, #C49BE9);">Massage</button>
                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-warning btn-sm mt-2" type="button">
                     View Profile
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="offcanvas-body">
        <div >
          <div class="card-body pb-0">
            <div class="d-flex justify-content-between">
              <div>
                <p><a href="#!" class="text-dark">{{ DetailBorrow.name }}</a></p>
                <p class="small text-muted">${{ DetailBorrow.price }}</p>
              </div>
              <div>
                <div class="d-flex flex-row justify-content-end mt-1 mb-4 text-danger">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <p class="small text-muted">Rated 4.0/5</p>
              </div>
            </div>
          </div>
          <hr class="my-0" />
          <div class="card-body pb-0">
            <div class="d-flex justify-content-between">
              <p><a href="#!" class="text-dark"></a></p>
              <p class="text-dark">#### 8787</p>
            </div>
            <p class="small text-muted">VISA Platinum</p>
          </div>
          <hr class="my-0" />
          <div class="card-body">
            <div class="card-body pb-0">
            <div class="d-flex justify-content-between">
            </div>
            <p class="text-dark">Name Shop : {{ DetailProps.name }}</p>
            <p class="text-dark">Name Product : {{ DetailBorrow.name }}</p>
            <div>
                <p><a href="#!" class="text-dark"> Borrow Date : {{ detailll.Borrow_date }}</a></p>
                <p><a href="#!" class="text-dark"> Borrow Date : {{ detailll.Return_date }}</a></p>
                <p><a href="#!" class="text-dark"> Total Price : $ {{ DetailBorrow.price }}</a></p>
              </div>
            <p class="small text-muted">Status :  {{ detailll.borrow_status }}</p>
          </div>
          </div>
        </div>
      </div>
      <div class="offcanvas-footer">
        <h5>Your Feedback</h5>
        <div class="card mb-3">
          <div class="card-body">
            <div class="d-flex flex-start">
              <img class="rounded-circle shadow-1-strong me-3"
                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(26).webp" alt="avatar" width="40"
                height="40" />
              <div class="w-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h6 class="text-primary fw-bold mb-0">
                    lara_stewart
                    <span class="text-body ms-2"></span>
                  </h6>
                  <p class="mb-0">2 days ago</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>
<script>
export default{
  props : ['DetailProps', 'DetailBorrow', 'detailll'],
}
</script>