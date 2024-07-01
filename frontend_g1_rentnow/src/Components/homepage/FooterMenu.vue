<template>
  <footer class="footer">
    <div class="footer-content">
      <div class="impact">
        <div class="logo-footer">
          <img src="../../assets/image 62.png" alt="" />
        </div>
        <div class="text-footer">
          <p>
            Borrow anything. Borrow things from RentNow instead of buying. Save money. Buy less.
          </p>
        </div>
        <div class="social-icons">
          <a href="#" class="social-icon">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="social-icon">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="social-icon">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="social-icon">
            <i class="fab fa-linkedin-in"></i>
          </a>
        </div>
      </div>
      <div class="links">
        <h2>Our Page</h2>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">About us</a></li>
          <li><a href="#">Message</a></li>
        </ul>
      </div>
      <div class="services">
        <h2>Our Services</h2>
        <ul>
          <li>Product Management</li>
          <li>Marketing</li>
          <li>Rent Anything</li>
        </ul>
      </div>
      <div class="contact">
        <h2>Contact Us</h2>
        <p>Phnom Penh</p>
        <p>Cambodia</p>
        <p>Phone: + 088 714736171</p>
        <p>Email: rentnow@gmail.com</p>
      </div>
    </div>
    <div class="footer-info">
      <p>It amazing for all of you that want to rent something</p>
      <p>You can rent what ever you want!</p>
    </div>
  </footer>
</template>
  
  <script>
export default {
  name: 'FooterComponent'
}
</script>
  
  <style scoped>
.footer {
  background: linear-gradient(90deg, #722cb3 30%, #c49be9);
  color: #fff;
  padding: 40px;
}

.footer-content {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 40px;
}

h2 {
  margin-bottom: 20px;
}

.social-icons {
  display: flex;
  justify-content: flex-start;
  align-items: center;
}

.social-icon {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: rgba(255, 255, 255, 0.1);
  color: #fff;
  margin-right: 10px;
  transition: background-color 0.3s ease;
}

.social-icon:hover {
  background-color: rgb(249, 189, 80);
}

.links ul,
.services ul {
  list-style-type: none;
  padding: 0;
}

.links ul li,
.services ul li {
  margin-bottom: 10px;
}

.links ul li a,
.services ul li {
  color: #fff;
  text-decoration: none;
  transition: color 0.3s ease;
}

.links ul li a:hover {
  color: #ccc;
}

.footer-info {
  margin-top: 40px;
  text-align: center;
  font-size: 18px;
}
</style>