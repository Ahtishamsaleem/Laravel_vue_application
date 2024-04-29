<!-- FeaturedProducts.vue -->
<template>
    <section class="featured-products">
      <b-card-group deck>
        <b-card v-for="(product, index) in products" :key="index" :img-src="product.image" img-alt="Product Image" title="Product Title" sub-title="Product Subtitle">
          <p class="card-text">{{ product.description }}</p>
          <b-button variant="primary">Buy Now</b-button>
        </b-card>
      </b-card-group>
    </section>
  </template>
  
  <script>
  export default {
    data() {
      return {
        products: [
          { image: 'product1.jpg', title: 'Product 1', description: 'Description of Product 1' },
          { image: 'product2.jpg', title: 'Product 2', description: 'Description of Product 2' },
          { image: 'product3.jpg', title: 'Product 3', description: 'Description of Product 3' }
        ]
      };
    }
  }
  </script>
  
  <style scoped>
  /* FeaturedProducts component styles */
  </style>
  