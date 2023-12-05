<template>
  <div class="product-board">
    <!-- <div>{{$route.params.category}}</div> -->
    <product-category :category="category"/>
    <product-item class="product-item" :product="product" />
    <!-- <div>{{product[1].name}}</div> -->
  </div>
</template>

<script>
import ProductCategory from '@/components/ProductCategory.vue';
import ProductItem from '@/components/ProductItem.vue';
import data from '@/assets/data/data.json';

const product = data;

export default {
  components: { ProductCategory, ProductItem },
   props:{
    category:{
      type : String,
      required: true,
    }
  },
  data(){
    return{
      product,
    }
  }
}
</script>

<style scoped>
  .product-board{
    margin: auto;
    width: 1200px;
    height: 1200px;
  }
  .product-item{
    width: 910px;
    height: 1200px;
    outline:1px solid red;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin: auto;
  }
</style>