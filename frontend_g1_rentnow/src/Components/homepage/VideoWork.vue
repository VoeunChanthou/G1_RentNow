<template>
    <div class="content px-5 py-5">
      <div class="text-section">
        <h2><B>SEE HOW IT WORK ?</B></h2>
        <!-- <h2><span class="highlight"><b>SEE</b></span> <b>HOW IT WORK</b> <span class="highlight"><b>?</b></span></h2> -->
        <p>
          Browse our wide selection of bikes, motorcycles, cars, 
          and more using our search filters. Click on an item for details, 
          select your rental dates, and make a reservation by filling in your details 
          and completing the secure payment. When you're done, return the item and share your feedback. 
          For more information or assistance, click here or contact our support team via email, phone, 
          or online chat. Thank you for choosing Rent Now!
          </p>
        <a href="/rentDetail">
          <button class="read-more"><b>Read More</b></button>
        </a>
      </div>
      <div class="video-section">
        <iframe
          class="embed-responsive-item"
          src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"
          allowfullscreen
        ></iframe>
      </div>
    </div>
  </template>
  
  <script>
  export default {}
  </script>
  
  <style scoped>
  /* body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
  }
   */
  .content {
    display: flex;
    align-items: center;
    padding: 30px;
    background-color:#eaeaea83;
    margin: 80px 34px;
    /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.176); */
  }
  
  .text-section {
    flex: 1;
  }
  
  .text-section h2 {
    font-size: 2em;
    margin: 0 0 20px 0;
    color: #FFD800;
  }
  
  /* .text-section .highlight {
    color: #FFD800;
  } */
  
  .text-section p {
    margin: 0 0 20px 0;
  }
  
  .read-more {
    background-color: #FFD800;
    color: white;
    border: none;
    padding: 6px;
    width: 170px;
    font-size: 1em;
    cursor: pointer;
    border-radius: 25px;
  }
  
  /* .read-more:hover {
    background-color: #FFD800;
  } */
  
  .video-section {
    flex: 1;
  }
  
  .video-section iframe {
    width: 100%;
    height: 300px;
    border-radius: 10px;
    /* max-width: 500px; */
  }
  </style>
  