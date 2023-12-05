<template>
  <div>
    <!-- <h2 @click="$router.push(`/category/${categoty}`)">
      {{ category }}dd
    </h2> -->
    <h2 class="category-title">
      {{ category }}
    </h2>
    <div v-show="category!=='BEST'" class="product-filter">   
      <ul class="sub-category"><!--for문으로 제어 예정-->
        <li>전체상품</li>
        <li>주방용품</li>
        <li>세탁용품</li>
        <li>욕실용품</li>
        <li>생활잡화</li>
      </ul>
    </div>
    <div class="product-filter">
      <h4>
        전체 n개의 제품이 있습니다. <!--수정-->
      </h4>
      <ul class="filter">
        <li>신상품</li>
        <li>낮은가격</li>
        <li>높은가격</li>
        <li>사용후기</li>
      </ul>
    </div>
    
    
  </div>
</template>

<script>

// import ProductItem from "@/components/ProductItem.vue";
export default {
  
  components:{
    // ProductItem,
  },

  data(){
    return{
      categorypath:'',
      // category:[
      //   "BEST",
      //   "기획전",
      //   "리빙상품",
      //   "뷰티상품",
      //   "패션상품",
      // ],
      
    }
  },
  props:{
    category: {
      type: String,
      required: true
    },
  },

  methods:{
    check(){
      console.log(this.categoryindex)
    }
  }
}
</script>

<style scoped>
  .category-title{
    font-size: 20px;
    font-weight: bold;
    color: #051809;
    text-align: center;
    margin-top: 13px;
    margin-bottom: 40px;
  }
  .product-filter{
    /* width: 890px; */
    width: 1200px;
    height: 44px;
    display: flex;
    margin: auto;
    justify-content: space-between;
    outline: 1px solid red;
  }
  .sub-category{
    display: flex;
    justify-content: space-around;
    /* outline: 5px solid blue; */
    width: 1200px;
    height: 44px;
  }
  .product-filter > .sub-category > li{
    width: 148px;
    height: 100%;
    padding: 8px 40px 10px 41px;
    background: #A7D397;
    border-radius: 10px;
    overflow: hidden;
    justify-content: center;
    align-items: center;
    display: inline-flex
  }
  .product-filter > h4{
    font-size: 16px;
    font-weight: normal;
  }
  .product-filter > .filter{
    font-size: 16px;
    font-weight: normal;
    display: flex;
    width: 267px;
    /* justify-content: space-around; */
    outline: 1px solid red;
  }
  .product-filter > .filter > li{
    /* margin-left: 15px; */
    box-sizing: border-box;
    height: 20px;
  }

</style>