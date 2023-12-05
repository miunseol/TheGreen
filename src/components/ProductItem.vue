<template>
  <div class="product-item">
    <router-link to="#">
      <img src="../assets/images/product/product1.png" alt="">
      <h4>상품제목</h4>
    </router-link>
  </div>
</template>

<script>
export default {

}
</script>

<style scoped>
  .product-item{
    width: 290px;
    height: 280px;
  }
  .product-item img{
    width: 290px;
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