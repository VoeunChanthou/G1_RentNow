
<template>
  <WebLayout>
    <serviceLoading v-if="!product.name"/>
    <div v-if="!isPay" class="sp px-5" style="
        background: rgba(0, 0, 0, 0.201);
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 4;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
      "
    >
      <div class="spinner-border text-primary" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
    </div>


   
      <!---alert-->

      <div
      v-if="showModal"
      style="
        background: rgba(0, 0, 0, 0.201);
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 4;
        display: flex;
        justify-content: center;
        align-items: center;
      "
    >
      <el-row>
        <el-col style="width: 300px; height: 300px; background: white;">
          <el-result
            icon="error"
            title="Error Tip"
            sub-title="Please follow the instructions"
          >
            <template #extra>
              <el-button type="primary" @click="cancelModal">OK</el-button>
            </template>
          </el-result>
        </el-col>
      </el-row>
    </div>

      <div
      v-if="success"
      style="
        background: rgba(0, 0, 0, 0.201);
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 4;
        display: flex;
        justify-content: center;
        align-items: center;
      "
    >
    <el-col :sm="12" :lg="6" style="width: 300px; height: 300px; background: white;">
      <el-result
        icon="success"
        title="Success Tip"
        sub-title="Please follow the instructions"
      >
        <template #extra>
          <el-button type="primary">Okay</el-button>
        </template>
      </el-result>
    </el-col>
    </div>
    

    

    <!--------->

    <div v-if=product.name class="bg-white">
    <PopupDelete  :massage = "commentshow.comment" @updatecomment = "updateById" />
    <CommentProduct @createcomment = "createcomment" />
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
            <el-carousel-item>
              <div class="product-slide-show">
                <img :src="product.image" width="60%" height="50%" alt="" />
              </div>
            </el-carousel-item>
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
          </div>

          <p>
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
            unknown printer took a galley of type and scrambled it to make a type specimen book.
          </p>

          <div class="price-detail">
            <h1 style="color: red">$ {{ product.price }}</h1>
            <span>Stock: 10</span>
            {{ price }}
            <div class="btn">
              <button @click="discrease">

                <Icon icon="codicon:dash" style="color: #eb0f0f" />
              </button>
              <span>{{ quantity }}</span>
              <button @click="increase">
                <Icon icon="heroicons:plus" />
              </button>
            </div>
          </div>

          <div class="date-detail">
            <div class="rent-date">
              <div class="date-input">
                <div class="date-label"><b>Rent Date</b></div>
                <div class="date-picker">
                  <span>Select a day:</span>
                  <input type="date" id="date-input" v-model="start_date" />
                </div>
              </div>
            </div>
            <div class="rent-date">
              <div class="date-input">
                <div class="date-label"><b>Pay Day</b></div>
                <div class="date-picker">
                  <span>Select a day:</span>
                  <input type="date" id="date-input" v-model="return_date" />
                </div>
              </div>
            </div>
          </div>

          <div class="button-action">
  

            <!-- Button trigger modal -->
            <button class="btn-rent" data-bs-toggle="modal" data-bs-target="#formfeedback" data-bs-whatever="@getbootstrap">Comment</button>
            <button
              type="button"
              class="btn-rent"
              data-bs-toggle="modal"
              data-bs-target="#exampleModal"
              @click="calculateDate"
            >
              Rent Now
            </button>
      
          </div>
        </div>
      </div>
    </div>

    <div class="map-location px-5 py-2 bg-white" style="height: auto; display: grid; grid-template-columns: 63% 36%; gap: 1%;">
      <div class="left-side shadow bg-white" style="margin-bottom: 20px;" >
        <h2 style="margin: 25px;">Comments</h2>
        
    <CardListComponent  :Comments = "CommentList"  @deletecomment = "deleteById"  @updatecomment = "showComment"/>

      </div>
      <div class="right-side shadow bg-white" style="height: 60vh;">
        <ShopMap :lat="shop.latitude" :long="shop.longitude"/>
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
            <h3 class="pay-price">$ {{ amount * numofdate}}</h3>
            <h4>Credit Card Details</h4>
          </div>

          <div class="modal-body2">
            <div class="form-container">
              <form @submit.prevent="submitPayment" id="payment-form">
                <div class="form-group">
                  <label for="card-name">Card Name</label>
                  <input v-model="cardName" type="text" id="card-name" name="card-name" placeholder="Card Name" />
                </div>

                <div class="form-group">
                  <label for="card-number">Card Number</label>
                  <div id="card-element" class="form-control">
        <!-- Stripe Card Element will be inserted here -->
      </div>

                </div>
                <button type="submit" class="btn-pay" data-bs-dismiss="modal" aria-label="Close"><b>Pay Secure</b></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
     
    <FooterMenuVue/>
  </WebLayout>
</template>
<script>
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import { Icon } from '@iconify/vue'
import axiosInstance from '@/plugins/axios';
import ShopMap from '@/Components/service/ShopMap.vue';
import FooterMenuVue from '../../../Components/homepage/FooterMenu.vue'
import CommentProduct from '@/Components/service/CommentProduct.vue';
import CardListComponent from '@/Components/service/CardListComment.vue'
import PopupDelete from '@/Components/service/PopupUpdate.vue'
import serviceLoading from '@/Components/loading/serviceLoading.vue'
import { loadStripe } from '@stripe/stripe-js';
import { useRouter } from 'vue-router'





export default {
  components: {
    WebLayout,
    Icon,
    ShopMap,
    CommentProduct,
    CardListComponent,
    FooterMenuVue,
    PopupDelete,
    serviceLoading
  },
  data() {
    return {
      router: useRouter(),
      product: {},
      shop: {},
      image: {},
      CommentList : [],
      commentshow  : {},
      idComment : null,
      // =========== payment =========
      start_date:"",
      return_date:"",
      numofdate: 0,
      quantity: 1,
      borrow_status: 'borrowed',

      stripe: null,
      elements: null,
      cardElement: null,
      amount: 0,

      isPay: true,
      showModal: false,
      success: false
    }
  },

  watch(){
    this.calculateDate();
  },
  async mounted() {
    // Load Stripe
    this.stripe = await loadStripe('pk_test_51Pc2fOKZk7gHGerhRYoYc86qicpwOW5BRIqT6Iq8vEldh1lbBTARwZP3hnnNaJbEknffCRKkwxqdhdI3rknxBJAa00OCtvG2nD'); // Replace with your publishable key

    // Create an instance of Elements
    this.elements = this.stripe.elements();

    // Create a Card Element and mount it to the #card-element div
    this.cardElement = this.elements.create('card', {
      style: {
        base: {
          iconColor: '#666EE8',
          color: '#31325F',
          fontWeight: 400,
          fontFamily: 'Helvetica Neue, Helvetica, Arial, sans-serif',
          fontSize: '16px',
          '::placeholder': {
            color: '#CFD7E0',
          },
        },
      },
    });
    this.cardElement.mount('#card-element');

    // Handle real-time validation errors from the card Element
    this.cardElement.on('change', (event) => {
      const displayError = document.getElementById('card-errors');
      if (event.error) {
        displayError.textContent = event.error.message;
      } else {
        displayError.textContent = '';
      }
    });
    this.getProductDetail()
    this.fetchComments()

    if (this.showModal) {
      document.body.classList.add('no-scroll');
    }
    this.calculateDate()
    
  },
  
  methods: {
    getProductDetail() {
      axiosInstance
        .get(`product/${this.$route.params.id}`)
        .then((response) => {
          this.product = response.data.data
          this.shop = response.data.data.shop
          this.image = response.data.data.detail
          this.amount = response.data.data.price
          this.shop = response.data.data.shop
        })
        .catch((error) => {
          console.log('erro hx')
        });
      },
      async fetchComments () {
            try {
                const response = await axiosInstance.get('list/comment/'+ this.$route.params.id)
                this.CommentList = response.data
            } catch (error) {
                console.error(error)
            }
        },
      async createcomment(data) {
      try {
        const response = await axiosInstance.post( '/comment', data );
        this.fetchComments()
      } catch (error) {
        console.error("Error creating category:", error);
      }
    },
    async showComment(id){
      try {
        this.idComment = id;
        const response = await axiosInstance.get(`/comment/${id}`);
        this.commentshow = response.data.data
      } catch (error) {
        console.error("Error getting category:", error);
      }
    },
    async updateById(data) {
      try {
        await axiosInstance.put('/comment/update/'+ this.idComment, { comment : data} );
        this.fetchComments()
      } catch (error) {
        console.error("Error updating category:", error);
      }
    },
    async deleteById(id) {
      try {

        await axiosInstance.delete(`/comment/delete/${id}`);
        this.fetchComments()
      } catch (error) {
        console.error("Error deleting category:", error);
      }
    },
    increase(){
      this.quantity += 1;
      totalPay()
    },
    discrease(){
      if(this.quantity > 1){
        this.quantity -= 1;
        totalPay()
      }
    },

    calculateDate(){
      const start = new Date(this.start_date);
      const end = new Date(this.return_date);
      const diffInDays = Math.ceil((end - start) / (1000 * 60 * 60 * 24));
      this.numofdate = diffInDays;
    },



    async submitPayment() {
      this.isPay = false;
      
      try {
        // Create a Payment Intent on the backend
        const { data } = await axiosInstance.post('/stripe/payment', {
          amount: (this.amount * this.numofdate) * 100, // Convert amount to cents
        });
        // Confirm the Card Payment
        const { error, paymentIntent } = await this.stripe.confirmCardPayment(data.clientSecret, {
          payment_method: {
            card: this.cardElement,
          }
        });

        if (error) {
          // Show error to your customer
          console.error(error.message);
          const displayError = document.getElementById('card-errors');
          displayError.textContent = error.message;
          this.isPay = true;
        this.showModal=true;

        } else {
          if (paymentIntent.status === 'succeeded') {
            console.log('Payment succeeded:', paymentIntent);
            // Show a success message to your customer
            this.showModal = false;
            this.paymentData();

          }
        }
      } catch (error) {
        console.error('Error creating payment intent:', error);
      this.isPay = true;
      this.showModal=true;

      }
    },

    async paymentData(){
        if(this.start_date != '' && this.return_date != ''){
        const response = await axiosInstance.post('/borrow/product',{
          'product_id': this.$route.params.id,
          'borrow_date': this.start_date,
          'price': this.numofdate * this.amount,
          'quantity': this.quantity,
          'return_date': this.return_date,
          'borrow_status': this.borrow_status,
          'status': 'borrowed'
        });
        console.log(response);
        this.success = true;
        this.router.push(`/receipt/${this.$route.params.id}`)
        this.isPay = true;

      }else{

        this.isPay = true;
        this.showModal=true;
        console.log('Error');
      }
      },

      cancelModal(){
        this.showModal = false;
        this.isPay = true;
        document.body.classList.remove('no-scroll');
      }
    },
    Watch: {
    showModal(value) {
        document.body.classList.add('no-scroll');
    },
  },
  }
  

</script>



<style scoped>
.no-scroll {
  overflow: hidden;
  background: pink;
}
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
.price-detail .btn {
  border: 1px solid #ffd800;
  border-radius: 20px;
  width: 100px;
  height: 40px;
  display: flex;
  justify-content: space-evenly;
  align-items: center;
}
.price-detail .btn button {
  background: none;
  border: none;
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
  width: 100%;
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


/* ========== payment style ========= */
#card-element {
  border: 1px solid #ced4da;
  padding: 10px;
  border-radius: 4px;
}
#payment-form {
  max-width: 500px;
  margin: auto;
}

</style>
