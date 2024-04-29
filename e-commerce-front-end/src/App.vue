<script setup>
import { RouterView, RouterLink } from 'vue-router';
</script>

<template>
  <RouterView name="home" /><RouterView />
  <!-- <Home/>   -->
</template>

<style scoped>
  nav {
    width: 100%;
    font-size: 24px;
  }
  nav a{
    display: inline-block;
    padding: 5px 10px;
    text-decoration: none;
    margin: 10px;
    border-radius: 5px;
  }
  nav a.router-link-exact-active{
    color: white;
    background-color: coral;
  }
</style>
<style src="./assets/css/global.css" scoped></style>
