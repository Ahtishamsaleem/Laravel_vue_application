<template>
  <div class="home">
    <div class="jumbotron">
      <h1>Welcome to Our Vue-Powered E-Commerce App</h1>
      <div class="rolling-text-container">
        <p class="rolling-text">Revolutionize your shopping experience with our user-friendly interface and seamless navigation.</p>
      </div>
      <router-link to="/shop" class="btn btn-primary">Start Shopping</router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: 'headlines'
}
</script>

<style scoped>
h1{
  background-color: saddlebrown;
  width: 70%;
  margin-left: 17%;
  border-radius: 10px;
}
p{
  background-color: blueviolet;
  color: black;
  font-size: 30px;
  border-radius: 10px;
}
.home {
  text-align: center;
}

.jumbotron {
  margin-top: 50px;
}

.rolling-text-container {
  overflow: hidden;
}

.rolling-text {
  white-space: nowrap;
  animation: marquee 15s linear infinite;
}

.btn {
  margin-top: 20px;
}

@keyframes marquee {
  0% { transform: translateX(100%); }
  100% { transform: translateX(-100%); }
}
</style>
