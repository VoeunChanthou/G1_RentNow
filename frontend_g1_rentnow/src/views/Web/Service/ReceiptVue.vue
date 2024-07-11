<template>
  <WebLayout>
    <div class="container mt-5">
      <div class="receipt-box p-4" ref="receiptContent">
        <div class="row">
          <div class="col-md-6">
            <img src="../../../assets/logo2.png" alt="Company Logo">
            <p>1234 Street Address, City, State, ZIP</p>
            <p>Email: info@company.com</p>
          </div>
          <div class="col-md-6 text-right">
            <h4>Payment Receipt</h4>
            <p>Receipt #: 12345</p>
            <p>Rent Date: 10 July 2024</p>
            <p>Pay Date: 20 July 2024</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <h5>Bill To:</h5>
            <p>Customer Name</p>
            <p>5678 Another Address, City, State, ZIP</p>
            <p>Email: customer@example.com</p>
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
                  <td>Product 1</td>
                  <td>2</td>
                  <td>$10.00</td>
                  <td>$20.00</td>
                </tr>
                <tr>
                  <td>Product 2</td>
                  <td>1</td>
                  <td>$15.00</td>
                  <td>$15.00</td>
                </tr>
                <tr>
                  <td>Service 1</td>
                  <td>1</td>
                  <td>$50.00</td>
                  <td>$50.00</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="3" class="text-right">Subtotal</td>
                  <td>$85.00</td>
                </tr>
                <tr>
                  <td colspan="3" class="text-right">Tax (10%)</td>
                  <td>$8.50</td>
                </tr>
                <tr>
                  <td colspan="3" class="text-right">Total</td>
                  <td>$93.50</td>
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
      </div>
    </div>
  </WebLayout>
</template>

<script>
import WebLayout from '@/Components/Layouts/WebLayout.vue';
import html2canvas from 'html2canvas';
import { jsPDF } from 'jspdf';

export default {
  components: {
    WebLayout
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
    }
  }
};
</script>

<style>
body {
    background-color: #f8f9fa;
  }
  
  .receipt-box {
    background-color: #ffffff;
    border: 1px solid #dee2e6;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
  }

  .col-md-6 img{
    width: 170px;
    margin-left: -10px;
  }
</style>
