<template>
  <div>
    <div class="product-item" v-for="product in product" :key="product">
      <router-link to="#">
        <img :src="product.path" alt="#">
        <h4>{{product.name}}</h4>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  props: ["product"]
}
</script>

<style scoped>
*{
  overflow: hidden;
  
}
img{
  display: block;
}
  .product-item{
    /* width: 290px; */
    width: 30%;
    height: 280px;
    /* margin-right: 15px; */
  }
  .product-item img{
    width: 290px;
    /* width: 100%; */
    height: 230px;
  }
  .product-item h4{
    font-size: 16px;
    font-weight: normal;
    color: #505246;
    text-align: center;
    padding-top: 10px;
    box-sizing: border-box;
  }
</style>