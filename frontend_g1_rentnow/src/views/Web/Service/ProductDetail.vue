<template>
  <WebLayout>
    <CommentProduct />
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
                <img :src="item.image" width="60%" height="50%"  alt="" />
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
      
            <button class="btn-rent" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Comment</button>
            <button class="btn-rent">Rent Now</button>
          </div>
        </div>
      </div>
    </div>
  </WebLayout>
  
</template>

<script>
import WebLayout from '../../../Components/Layouts/WebLayout.vue'
import { Icon } from '@iconify/vue'
import axiosInstance from '@/plugins/axios';
import CommentProduct from '@/Components/service/CommentProduct.vue';

export default {
  components: {
    WebLayout,
    Icon,
    CommentProduct
  },
  data() {
    return {
      product: {},
      shop: {},
      image: {}
    }
  },
  mounted() {
    this.getProductDetail()
  },
  methods: {
    getProductDetail() {
      axiosInstance.get(`product/${this.$route.params.id}`)
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
</style>