<template>
  <section>
    <div>
      <img src="#" alt="#">
      <p>상품명</p>
    </div>
    <div>
      <img src="#" alt="#">
      <p>상품명</p>
    </div>
    <div>
      <img src="#" alt="#">
      <p>상품명</p>
    </div>
  </section>
</template>

<script>
export default {

}
</script>

<style scoped>
  div{
    width: 380px;
    height: 100%;
  }
  section{
    outline:1px solid red;
    width: 1200px;
    display: flex;
    justify-content: space-between;
  }
  img{
    display: block;
    width: 380px;
    height: 315px;
    background-color: #333;
  }
  p{
    width: 380px;
    height: 45px;
    background-color: #eaeaea;
    text-align: center;
    padding: 8px;
  }
</style>