<template>
  <carousel :items-to-show="2">
    <slide v-for="(slide, index) in slides" :key="index">
      <div class="carousel-caption">
        <img :src="slide.image" :alt="slide.title" class="carousel-image">
        <h3>{{ slide.title }}</h3>
        <p>{{ slide.description }}</p>
      </div>
    </slide>
    <navigation />
      <pagination />
      </carousel>
</template>

<script>
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'

export default {
  name: 'App',
  components: {
    Carousel,
    Slide,
    Pagination,
    Navigation,
  },
  data() {
    return {
      slides: [
        { id: 1, image: 'images/image1.jpg', alt: 'Alt Text 1', title: 'Alt Text 1' ,description:'Product 1'},
        { id: 1, image: 'images/image2.jpg', alt: 'Alt Text 2', title: 'Alt Text 2' ,description:'Product 2'},
        { id: 1, image: 'images/image3.jpg', alt: 'Alt Text 3', title: 'Alt Text 3' ,description:'Product 3'},
        { id: 1, image: 'images/image4.jpg', alt: 'Alt Text 4', title: 'Alt Text 4' ,description:'Product 4'},
       
      ]
    }
  }
}
</script>

<style scoped>
.carousel-image {
  width: 50%; /* Set the width of the image to 100% of its container */
  height: 20%; /* Automatically calculate the height based on the aspect ratio */
}
</style>
