<template>
  <!--각 링크 수정 필요-->
  <div class="home">
    <div class="top-contents">
      <h2 class="head-top-menu-md">베스트</h2>
      <router-link to="#" class="best-product" :key="i" v-for="(product,i) in products">
        <img :src="product.path" alt="">
        <p class="body-title-bd text-center" style="white-space:pre-line">{{ product.product_name }}</p>
      </router-link>
    </div> <!-- top contents 끝-->
    <div class="subtitle">
      <h3 class="body-title-norm">진행중인 기획전</h3>
      <span class="body-title-bd">전체보기 &gt;</span>
    </div>
    <div class="mid-contents">
      <div class="left-box">
        <img src="../assets/images/spactial_exhibition/campaign.png" alt="">
      </div>
      <div class="right-box" >
        <product-item :product="product" class="event-product"/>
        <product-item/>
        <product-item/>
        <product-item/>
      </div> <!--right box-->
    </div> <!--mid-contents-->
    <div class="subtitle">
      <h3 class="body-title-norm">새로나온 상품</h3>
      <span class="body-title-bd">전체보기 &gt;</span>
    </div>
    <div class="bottom-contents">
      <div class="product-list">
        <product-thumb/>
      </div>
    </div><!--bottom-contents-->
    <div class="campaign"><!--하단 기획전-->
      <div class="campaign-box">
        <img src="../assets/images/spactial_exhibition/campaign2.png" alt="">
        <p>
          지구와 함께 살고 있는 수많은 동·식물<br>
          그리고 세상에 단 하나뿐인 당신!<br>
          미래세대를 위해 우리 함게 도전해 볼까요?
        </p>
      </div>
      <div class="campaign-box"> 
        <img src="../assets/images/spactial_exhibition/campaign3.png" alt="">
        <p>
          <b>
            부피가 작은 것들(라이터/칫솔/펜/빨대)<br>
          </b>

            실리콘제품 (실리콘 주걱/젖병)
            주방용품(고무장갑/고무줄/고무대야)
            장난감류
            안경집
            휴대폰 케이스
            의약품(캡슐 약/ 껌 포장재)
            아이스팩(아이스/보온/보냉팩)
            카세트 테이프/ 비디오 테이프
            <br><br>
            플라스틱인척 하는 쓰레기들이 너무 많아요. 
            최대한 사용하지 않아야 하지만 
            어쩔 수 없이 사용하게 된다면 분리배출/ 쓰레기 배출 방법을 
            꼭 기억하세요 :)
            <br>
            <br>

            출처: 홍수열, 「그건 쓰레기가 아니라고요」, 슬로비, 2020
        </p>
      </div>
    </div>

  </div>
</template>

<script>

import ProductItem from '../components/ProductItem.vue'
import ProductThumb from '@/components/ProductThumb.vue';
import data from '@/assets/data/data.json'

const product = data;
export default {
  name: 'HomeView',
  components: {
    ProductItem,
    ProductThumb
  },
  data(){
    return{
      product,
      // 상품 배열
      products:[
        {
          product_name:'자상한 농부 \n설거지비누(단품)',
          path:require('../assets/images/product/best_product_icon1.png')
        },
        {
          product_name:'노란 햇살 틴트 \n1+1',
          path:require('../assets/images/product/best_product_icon2.png')
        },
        {
          product_name:'[탄소창고] \n작은스푼&포크 세트',
          path:require('../assets/images/product/best_product_icon3.png')
        },
        {
          product_name:'고풍스러운 동전통과 \n지갑 세트',
          path:require('../assets/images/product/best_product_icon4.png')
        },
        {
          product_name:'아침은 과일 에이드 \n(사과,망고)',
          path:require('../assets/images/product/best_product_icon5.png')
        },
        {
          product_name:'어디서든 소쿠리 \n나들이 세트',
          path:require('../assets/images/product/best_product_icon6.png')
        },
        {
          product_name:'맛있는 재활용 \n악세서리',
          path:require('../assets/images/product/best_product_icon7.png')
        },
      ]
    }
  }
}
</script>

<style scoped>
.top-contents{
  display: flex;
  width: 1200px;
  min-width: 1200px;
  height: 250px;
  padding: 30px 0px;
  justify-content: center;
  align-items: center;
  gap: 25px;
  flex-shrink: 0;
  margin: auto;
  outline: 1px solid red;
}
.best-product{
  display: flex;
  height: 180px;
  padding: 0px 10px;
  flex-direction: column;
  align-items: center;
  gap: 24px;
}
.subtitle{
  display: flex;
  width: 1200px;
  padding: 0px 40px;
  justify-content: flex-end;
  align-items: center;
  gap: 430px;
  outline: 1px solid black;
  margin: auto;
}
.mid-contents{
  display: flex;
  width: 1200px;
  height: 670px;
  padding: 0px 10px;
  justify-content: center;
  align-items: center;
  gap: 20px;
  flex-shrink: 0;
  margin: auto;
  border-bottom: 1px solid #c8c8c8;
}
.right-box{
  display: flex;
  width: 780px;
  height: 640px;
  justify-content: space-between;
  align-items: center;
  align-content: space-between;
  flex-shrink: 0;
  flex-wrap: wrap;

}
.event-product{
  display: flex;
  width: 780px;
  height: 640px;
  overflow: hidden;
  flex-wrap: wrap;
  justify-content: space-between;
  
}
.event-product ::v-deep(.product-item){
  width: 380px;
  height: 310px;
  margin-bottom: 10px;
}
.event-product ::v-deep(.product-item img){
  width: 380px;
}.bottom-contents{
  /* display: flex; */
  width: 1200px;
  padding-bottom: 0px;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  gap: 42.5px;
  margin: auto;
}
.bottom-contents > .product-list{
  display: flex;
  justify-content: space-between;
  align-items: center;
  
}

.campaign{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 30px;
}

.campaign-box{
  display: flex;
width: 1200px;
height: 560px;
justify-content: center;
align-items: flex-start;
  flex-shrink: 0;
  background-color: #EBF3E8;
}
.campaign-box>p{
  display: flex;
width: 830px;
height: 560px;
padding: 193px 69px;
justify-content: center;
align-items: center;
flex-shrink: 0;
}
.campaign-box:nth-child(2){
  display: flex;
  flex-direction: row-reverse;
  
}
.campaign-box:nth-child(2) >p{
  display: flex;
  width: 547px;
  padding: 23px 74px;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 25px;
  flex-shrink: 0;
  
}
</style>
