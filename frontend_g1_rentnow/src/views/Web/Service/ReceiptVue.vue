<template>
  <WebLayout>
    <div class="main bg-white">
    <div class="container mt-5">
      <div class="receipt-box p-4" ref="receiptContent">
        <div class="row">
          <div class="col-md-6">
            <img src="@/assets/logo2.png" alt="Company Logo">
            <p>1234 Street Address, City, State, ZIP</p>
            <p>Email: </p>
          </div>
          <div class="col-md-6 text-right">
            <h4>Payment Receipt</h4>
            <p>Receipt #: {{ product.id }}</p>
            <p>Rent Date: {{ receipt.start_date }}</p>
            <p>Pay Date: {{ receipt.return_date }}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <h5>Bill To:</h5>
            <p>Customer Name: {{ user.first_name }} {{ user.last_name }}</p>
            <p>5678 Another Address, City, State, ZIP</p>
            <p>Email: {{ user.email }}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered">
              <thead>
                <tr class="tr">
                  <th style="background-color: #691ba5; color: white">Description</th>
                  <th style="background-color: #691ba5; color: white">Quantity</th>
                  <th style="background-color: #691ba5; color: white">Price</th>
                  <th style="background-color: #691ba5; color: white">Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{ product.name }}</td>
                  <td>{{ receipt.quantity }}</td>
                  <td>${{ product.price }}</td>
                  <td>${{ receipt.price }}</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="3" class="text-right">Tax (10%)</td>
                  <td>$8.50</td>
                </tr>
                <tr>
                  <td colspan="3" class="text-right">Total</td>
                  <td>{{ product.price * receipt.quantity }}</td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-md-12 text-center">
            <p>Please take this receipt when you go to pick up the product at the shop</p>
            <p>Thank you for rent me!</p>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
        <button class="btn btn-primary" @click="downloadPDF">Download PDF</button>
        <button class="btn btn-secondary ml-2" @click="$router.go(-1)">Okay</button>
      </div>
    </div>
    </div>
  </WebLayout>
</template>

<script>
import WebLayout from '@/Components/Layouts/WebLayout.vue';
import html2canvas from 'html2canvas';
import jsPDF from 'jspdf';
import axiosInstance from '@/plugins/axios';

export default {
  components: {
    WebLayout
  },
  data() {
    return {
      receipt: {},
      product: {},
      user: {}
    };
  },
  mounted(){
    this.getReceipt()
  },
  methods: {
    downloadPDF() {
      html2canvas(this.$refs.receiptContent).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        const pdf = new jsPDF();
        const imgProps = pdf.getImageProperties(imgData);
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

        pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
        pdf.save('receipt.pdf');
      });
    },
    async getReceipt(){
      const response = await axiosInstance.get(`borrow/get/receipt/${this.$route.params.id}`);
      this.receipt = response.data.data;
      this.product = response.data.data.product;
      this.user = response.data.data.user;
    }
  }
};
</script>

<style scoped>
.container {
  padding-bottom: 40px;
}
.receipt-box {
  background-color: #ffffff;
  border: 1px solid #dee2e6;
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.col-md-6 img {
  width: 170px;
  margin-left: -10px;
}
</style>