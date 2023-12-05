<template>
  <div class="product-board">
    <!-- <div>{{$route.params.category}}</div> -->
    <product-category :category="category"/>
    <product-item class="product-item"/>
  </div>
</template>

<script>
import ProductCategory from '@/components/ProductCategory.vue';
import ProductItem from '@/components/ProductItem.vue';


export default {
  components: { ProductCategory, ProductItem },
   props:{
    category:{
      type : String,
      required: true,
    }
  },
}
</script>

<style scoped>
  .product-board{
    margin: auto;
    width: 1200px;
  }
</style>