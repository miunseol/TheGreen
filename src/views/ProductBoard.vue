<template>
  <div>
    <!-- <div>{{$route.params.category}}</div> -->
    <product-category :category="category"/>
  </div>
</template>

<script>
import ProductCategory from '@/components/ProductCategory.vue';


export default {
  components: { ProductCategory },
   props:{
    category:{
      type : String,
      required: true,
    }
  },
}
</script>

<style>

</style>