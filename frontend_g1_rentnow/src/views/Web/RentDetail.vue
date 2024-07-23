<template>
  <WebLayout>
    <div class="main bg-white px-5">
      <div class="header">
        <h2><b>HOW IT WORKS</b></h2>
      </div>

      <div class="detail1">
        <h4>For Borrowing</h4>
        <p>1) Browse items listed for rent and make a choice</p>
        <p>2) Schedule rental for as long as you need the item</p>
        <p>3) Use the item to your satisfaction within the rental period</p>
        <p>4) When the rental time elapses, you'll return the item in its original condition</p>

        <a href="/service"><button type="button" class="btn" style="background-color: #691BA5;color: white;">CHECK OUT ITEMS FOR RENT NEAR YOU</button></a>
      </div>

      <div class="detail1">
        <h4>For renting</h4>
        <p>1) List your item(s) for rent and upload photos, description, location, and price</p>
        <p>2) Get notified and chat with anybody interested in your item</p>
        <p>3) Agree on a convenient time and place to handover your item</p>
        <p>4) When the agreed-upon time elapses, you get your item back</p>

        <a href="/message"><button type="button" class="btn" style="background-color: #691BA5;color: white;">LIST AN ITEM NOW</button></a>
      </div>
      <div class="videoDetail">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe
            class="embed-responsive-item"
            src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"
            allowfullscreen
          ></iframe>
        </div>
      </div>

    </div>
  </WebLayout>
</template>

<script>
import WebLayout from '../../Components/Layouts/WebLayout.vue'

export default {
  components: { WebLayout }
}
</script>

<style scoped>
.header h2, .videoDetail {
  display: flex;
  justify-content: center;
}
.embed-responsive-item{
    width: 700px;
    height: 400px;
} 

.main{
    display: flex;
    flex-direction: column;
    gap: 40px;
    padding: 30px;
}

.detail1{
    margin-left: 50px;
}
</style>