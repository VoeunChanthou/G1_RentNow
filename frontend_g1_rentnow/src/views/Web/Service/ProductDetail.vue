<template>
  <WebLayout>
    <div class="content px-5">
      <!-- back button -->
      <div class="back-button" @click="$router.go(-1)">
        <i><img src="../../../assets/backButton.png" alt="backButton" /></i>
        <i><img src="../../../assets/removeBack.png" alt="backButton" /></i>
      </div>
      <!-- back button -->

      <div class="product-detail">
        <div class="product-detail-left">
          <div class="not-love">
            <img src="../../../assets/notLove.png" alt="" />
          </div>

          <!-- product slide show product -->
          <el-carousel indicator-position="outside">
            <el-carousel-item v-for="item in image" :key="item.id">
              <div class="product-slide-show">
                <img :src="item.image" width="60%" height="50%" alt="" />
              </div>
            </el-carousel-item>
          </el-carousel>
          <!-- product slide show product -->
        </div>
        <div class="product-detail-right">
          <div class="header-right-detail">
            <div class="name-detail">
              <h4>{{ product.name }}</h4>
              <p style="color: red">{{ shop.name }}</p>
            </div>
            <h1 style="color: red">{{ product.days }} Days</h1>
          </div>

          <p>
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
            unknown printer took a galley of type and scrambled it to make a type specimen book.
          </p>

          <div class="price-detail">
            <h1 style="color: red">$ {{ product.price }}</h1>
            <span>Stock: 10</span>
            <button class="btn">
              <Icon icon="codicon:dash" style="color: #eb0f0f" />
              <span>1</span>
              <Icon icon="heroicons:plus" />
            </button>
          </div>

          <div class="date-detail">
            <div class="rent-date">
              <div class="date-input">
                <div class="date-label"><b>Rent Date</b></div>
                <div class="date-picker">
                  <span>Select a day:</span>
                  <input type="date" id="date-input" value="2024-10-09" />
                </div>
              </div>
            </div>

            <div class="rent-date">
              <div class="date-input">
                <div class="date-label"><b>Pay Day</b></div>
                <div class="date-picker">
                  <span>Select a day:</span>
                  <input type="date" id="date-input" value="2024-10-09" />
                </div>
              </div>
            </div>
          </div>

          <div class="button-action">
            <button class="btn-comment">Comment</button>

            <!-- Button trigger modal -->
            <button
              type="button"
              class="btn-rent"
              data-bs-toggle="modal"
              data-bs-target="#exampleModal"
            >
              Rent Now
            </button>
          </div>
        </div>
      </div>
    </div>

    <!--==================== payment popup ========================= -->

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <img src="../../../assets/visa-image.png" alt="" />
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>

          <div class="modal-body1">
            <img src="../../../assets/pay-image.png" alt="" />
            <h3 class="pay-price">$ 300</h3>
            <h4>Credit Card Details</h4>
          </div>

          <div class="modal-body2">
            <div class="form-container">
              <form>
                <div class="form-group">
                  <label for="card-name">Card Name {{ cardName }}</label>
                  <input v-model="cardName" type="text" id="card-name" name="card-name" placeholder="Card Name" />
                </div>

                <div class="form-group">
                  <label for="card-number">Card Number {{ cardNumber }}</label>
                  <input
                    v-model="cardNumber"
                    type="number"
                    id="card-number"
                    name="card-number"
                    placeholder="12334455667"
                  />
                </div>

                <div class="form-row">
                  <div class="form-group">
                    <label for="expiration">Expiration {{ expiration }}</label>
                    <input v-model="expiration" type="number" id="expiration" name="expiration" placeholder="MM/YYYY" />
                  </div>

                  <div class="form-group">
                    <label for="cvv">CVV {{ cvv }}</label>
                    <input v-model="cvv" type="number" id="cvv" name="cvv" placeholder="" />
                  </div>

                </div>
                <div class="form-group">
                  <label for="date">Date {{ date }}</label>
                  <input v-model="date" type="date" id="date" name="date" placeholder="mm/dd/yy" />
                </div>

                <a href="/receipt"><button type="button" class="btn-pay"><b>Pay Secure</b></button></a>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
     
  </WebLayout>
</template>

<script>
import WebLayout from '../../../Components/Layouts/WebLayout.vue'
import { Icon } from '@iconify/vue'
import axiosInstance from '@/plugins/axios'

export default {
  components: {
    WebLayout,
    Icon
  },
  data() {
    return {
      product: {},
      shop: {},
      image: {},

      // =========== payment =========
      cardName: "",
      cardNumber:"",
      expiration:"",
      cvv:"",
      date:""
    }
  },
  mounted() {
    this.getProductDetail()
  },
  methods: {
    getProductDetail() {
      axiosInstance
        .get(`product/${this.$route.params.id}`)
        .then((response) => {
          this.product = response.data.data
          this.shop = response.data.data.shop
          this.image = response.data.data.detail
        })
        .catch((error) => {
          console.log(error)
        })
    }
  }
}
</script>

<style scoped>
/* ============= back button style ============= */
.back-button {
  margin-top: 50px;
  display: flex;
  justify-content: space-between;
  padding: 15px;
  background: white;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.135);
}

/* ======== product-show ============= */
.product-detail {
  display: flex;
  padding: 10px 0;
}

.product-detail-left {
  flex: 2.2;
  padding: 30px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.135);
}

.not-love {
  display: flex;
  justify-content: end;
}
/* =========== Right =============== */
.product-detail-right {
  display: flex;
  flex-direction: column;
  gap: 10px;
  flex: 3;
  padding: 30px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.135);
}

.price-detail {
  display: flex;
  gap: 40px;
  align-items: center;
}
.price-detail button {
  border: 1px solid #ffd800;
  border-radius: 20px;
  width: 100px;
  height: 40px;
  display: flex;
  justify-content: space-evenly;
  align-items: center;
}

.header-right-detail {
  display: flex;
  justify-content: space-between;
}

/* ========== slide-show-style ========== */
.el-carousel {
  display: flex;
  flex-direction: column;
  justify-content: center;
  margin: auto;
}

.product-slide-show {
  width: 100%;
  display: flex;
  justify-content: center;
}

/* ========== select day style =========== */

.date-detail {
  display: flex;
  justify-content: space-between;
}
.date-input {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 8px;
}

.date-label {
  color: #691ba5;
}

.date-picker {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 8px 12px;
  background-color: #ffffff;
  border: 1px solid #691ba5;
  border-radius: 6px;
  font-size: 16px;
  color: #111827;
}

.date-picker input[type='date'] {
  border: none;
  outline: none;
  font-size: 16px;
  color: #111827;
  background-color: transparent;
}

.date-picker .caret-icon {
  color: #6b7280;
  font-size: 14px;
}

/* ========== button-action ========== */

.button-action {
  padding: 30px 0;
  display: flex;
  justify-content: space-between;
}

.button-action button {
  padding: 10px;
  width: 170px;
  border: 1px solid #691ba5;
  border-radius: 20px;
  background: white;
}

.button-action button:hover {
  background: #691ba5;
  color: white;
}

/* ============= payment popup style ============= */
.modal-body2{
  display: flex;
}

.modal-content{
  width: 650px;
  display: flex;
  justify-content: center;
}
.pay-price {
  color: #691ba5;
}
.modal-body1 {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.modal-header img {
  width: 120px;
}
.modal-body1 img {
  width: 150px;
}

/* ============= form styel========== */
.form-container {
  margin: auto;
  padding: 30px;
  display: flex;
  gap: 30px;
}

.form-group {
  margin-bottom: 20px;
}

.form-group input {
  width: calc(100% - 20px);
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}

.form-group input:focus {
  outline: none;
  border-color: #6200ee;
}

.form-group .error {
  color: red;
  font-size: 12px;
}

.form-row {
  display: flex;
  justify-content: space-between;
}

.form-row .form-group {
  width: 48%;
}

/* ========== pay button style ========= */
.btn-pay{
  background: #691ba5;
  border: none;
  padding: 10px;
  color: white;
  border-radius: 6px;
  width: 480px;
  margin: auto;
}

</style>