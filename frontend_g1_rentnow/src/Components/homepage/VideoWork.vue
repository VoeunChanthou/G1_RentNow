<template>
    <div class="container">
      <div class="text-section">
        <h2><span class="highlight"><b>See</b></span> <b>how it work</b> <span class="highlight"><b>?</b></span></h2>
        <p>
          Skilline’s school management software helps traditional and online schools manage scheduling. Skilline’s school management software helps traditional and online schools manage scheduling.
        </p>
        <button class="read-more"><b>Read More</b></button>
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
  .container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 50px;
    background-color: white;
    margin: 20px auto;
    width: 90%;
    /* max-width: 1200px; */
    margin-top: 100px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.176);
  }
  
  .text-section {
    flex: 1;
    /* padding-right: 20px; */
  }
  
  .text-section h2 {
    font-size: 2em;
    margin: 0 0 20px 0;
  }
  
  .text-section .highlight {
    color: #fbb034;
  }
  
  .text-section p {
    /* font-size: 1.2em; */
    /* color: #555; */
    /* line-height: 1.5; */
    margin: 0 0 20px 0;
  }
  
  .read-more {
    background-color: #691BA5;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 1em;
    cursor: pointer;
    border-radius: 5px;
  }
  
  .read-more:hover {
    background-color: #FFD800;
  }
  
  .video-section {
    flex: 1;
    /* display: flex;
    justify-content: center;
    align-items: center; */
  }
  
  .video-section iframe {
    width: 100%;
    height: 300px;
    border-radius: 10px;
    /* max-width: 500px; */
  }
  </style>
  