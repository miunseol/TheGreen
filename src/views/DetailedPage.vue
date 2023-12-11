<template>
  <div id="header" class="detailed-main">
    <div class="detailed-img"><img src="https://irecipe.com/web/product/big/202307/31f491c798188d7ac94e9c9d76583953.png"
        style="width:650px">
    </div>
    <div class="column-layout">
      <h1>{{ product.name }}</h1>
      <div class="priceicon">
        <h1>{{ product.price }}원</h1>
        <div class="icon">
          <P><i class="fa-regular fa-heart"></i></P>
          <P><i class="fa-solid fa-link"></i></P>
        </div>
      </div>
      <div>
        <div class="delivery">
          <p>배송방법</p>
          <p>택배</p>
        </div>
        <div class="delivery-price">
          <p>배송비</p>
          <p>3000원(30,000원 이상 구매 시 무료)</p>
        </div>
      </div>
      <div class="column-name">
        <P><b>{{ product.name }}</b></P>
        <div class="column-button">
          <input v-on:click="countdown" type="button" value="-" />
          <input type="text" :value="quantity" readonly>
          <input v-on:click="countup" type="button" value="+" />

        </div>
        <span>{{ totalPrice }}원</span>
      </div>
      <div class="total-price">
        <span>총 상품금액</span>
        <div>
          <span>{{ totalPrice }}원</span>
          <span>({{ quantity }}개)</span>
        </div>
      </div>
      <div class="buttonList">
        <router-link class="head-top-md" to="/">장바구니</router-link>
        <router-link class="head-top-md" to="/"><i class="fa-solid fa-gift"></i>선물하기</router-link>
        <router-link class="head-top-md" to="/theorder">바로구매</router-link>
       
        
      </div>
    </div>


  </div>
  <div class="detailedcenter">
    <div class="detailedgroup">
      <span>제품상세</span>
      <span>구매안내</span>
      <span>리뷰({{ }})</span>
    </div>
    <div class="detailedimg">
      <img src="https://irecipe.com/mobile/upload/pd/20231027_event_pdtop_1.jpg" style="width:1200px">
      <img src="https://irecipe.com/mobile/upload/pd/20230823CleansingBalm_1.jpg" style="width:1200px">
    </div>
    <div class="eventlist">
      <span><a href="#header"><i class="fa-solid fa-arrow-up"></i></a></span>
      

    </div>
    <div class="detaileditem">
    <h1>상품구매안내</h1>
    <div>
      <p>결제 안내</p>
    </div>
    <div class="itemprice">
      <span>결제안내</span>
      <span>무통장 입금, 신용카드, 네이버페이, 실시간 계좌이체, 휴대폰 결제를 통해 결제 하실 수 있습니다.<br>
        무통장 입금 주문시 주문 후 3일 이내로 입금을 하셔야 하며 입금되지 않은 주문은 자동취소 되는 점 유의바랍니다.<br>
        주문시 입력한 입금자명과 실제 입금자의 성명이 다른 경우 배송이 지연될 수 있으니 반드시 전화문의나 CS Center > 상품Q&A에 남겨주세요<br>

        입금계좌 : 기업은행 012-34567-89-012 예금주 GREEN</span>
    </div>

    <div class="itemdelivery">
      <p>배송 안내</p>
      <div class="itemevent">
        <span>배송방법itemevent</span>
        <span>택배</span>

      </div>
      <div class="itemevent">
        <span>배송 지역</span>
        <span>전국지역</span>

      </div>
      <div class="itemevent">
        <span>배송 비용</span>
        <span>3,500원</span>

      </div>
      <div class="itemevent">
        <span>배송기간</span>
        <span>1일~3일</span>

      </div>
      <div class="itemevent">
        <span>배송 안내</span>
        <span>3만원 이상 무료배송 / 3만원 미만 주문시 배송비 3,500원이 부과됩니다.<br>
          오후 12시까지 입금 확인 된 주문 건에 한해 당일 발송됩니다. 교환 및 반품 시에는 배송비 3,000원이 부과될 수 있습니다. </span>

      </div>
    </div>
    <div class="itemchange">
      <p>교환/반품 안내</p>
      <div class="itemevent">
        <span>교환/반품 안내</span>
        <span><b>교환 및 반품이 가능한 경우</b><br>
          - 단순 변심, 착오 구매에 따른 교환/반품은 상품을 공급 받으신 날로부터 10일 이내 가능합니다.<br>
          (왕복 배송비 6,000원 소비자 부담) 단, 일부 제품의 경우 포장을 개봉하였거나 포장이 훼손되어 상품가치가 상실된 경우에는 교환/반품이 불가능합니다.<br>
          - 공급받으신 상품 및 용역의 내용이 표시.광고 내용과 다르거나 다르게 이행된 경우에는 공급받은 날로부터 3월이내, 그사실을 알게 된 날로부터 30일이내 청약철회가 가능합니다.<br>
          (반품/교환 배송비 회사 부담)<br>
          <b>교환 및 반품이 불가능한 경우</b><br>
          - 고객님의 책임 있는 사유로 상품등이 멸실 또는 훼손된 경우.<br>
          (단, 상품의 내용을 확인하기 위하여 포장 등을 훼손한 경우는 제외)<br>
          - 고객님의 사용 또는 일부 소비에 의하여 상품의 가치가 현저히 감소한 경우<br>
          - 시간의 경과에 의하여 재판매가 곤란할 정도로 상품등의 가치가 현저히 감소한 경우<br>
          - 복제가 가능한 상품등의 포장을 훼손한 경우<br>
          <b>주의사항</b><br>
          - 상품 교환/반품 시에는 고객센터 (1522-2097)로 문의하신 후 보내주셔야 원활히 처리됩니다.<br>
          - 반품시 증정사은품까지 함께 동봉하여 보내주셔야 합니다.</span>
      </div>
    </div>
    <div class="itemservis">
      <p>서비스 문의</p>
      <div class="itemevent">
        <span>서비스 문의</span>
        <span>02-111-1111</span>
      </div>
    </div>
  </div>
  </div>
 
</template>

<script>



export default {
  components: {},
  data() {
    return {

      product: {
        name: "제품명이 표출됩니다",
        price: 19200,

      },
      quantity: 0,
      totalPrice: 0,
    }
  },
  methods: {
    countup() {
      this.quantity++;
      this.totalPrice = this.quantity * this.product.price;
    },
    countdown() {
      if (this.quantity > 0) {
        this.quantity--;
        this.totalPrice = this.quantity * this.product.price;
      }

    }

  }


}

</script>

<style>
* {
  padding: 0px;
  margin: 0px;
  text-decoration: none;
}

.detailed-main {
  width: 1200px;
  margin-top: 60px;

  margin: auto;
  display: flex;

}
.detailedcenter{
  position:relative;
}
.detailedgroup {
  text-align: center;
  position:sticky;
  top:-1px;
  display:block
}

.detailedgroup > span{
  width:400px;
  height:80px;
  border:1px solid #c8c8c8;
  z-index: 100;
  background-color:#ffffff;
}

.detailedgroup > span:first-child{
  background-color:#c8c8c8;
}

.column-layout {
  width: 510px;
  height: 420px;
  margin: 8px;
  text-align: left;
  font-size: 24px;
}

.priceicon {

  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-top: 10.5px
}

.icon {
  display: flex;
  align-items: flex-start;
  padding: 8px;
  gap: 10px;
}

.delivery {

  width: 100%;
  font-size: 12px;
  display: flex;
  align-items: flex-start;
  gap: 20px;
  align-self: stretch;
  color: #505246;
  padding: 8px 0 8px 0;
  box-sizing: border-box;
}

.delivery-price {
  width: 100%;

  font-size: 12px;
  display: flex;
  align-items: flex-start;
  gap: 30px;
  align-self: stretch;
  padding: 8px 0 8px 0;
  box-sizing: border-box;
  color: #505246;
}

.column-name {
  display: flex;
  gap: 20px;
  padding: 8px 0;

  align-items: center;
  color: #051809;
  font-size: 14px;
  border-top: 1px solid #c8c8c8;
  border-bottom: 1px solid #c8c8c8;


}

.column-name p {
  width: 315px;


}

.column-name input {
  width: 32px;
  height: 32px;
  background-color: #fff;
  border: 1px solid #505246;

  text-align: center;
}

.column-name input:nth-child(1) {
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;

}

.column-name input:nth-child(3) {
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;

}

.total-price {
  display: flex;
  justify-content: space-between;
  padding: 8px;
  margin: 28px 0;
  box-sizing: border-box;


  gap: 20px;

}



.total-price span:nth-child(2) {

  font-size: 14px;
  color: #051809;
  text-align: center;
  align-items: center;
  margin-left: 10px;


}

.buttonList {
  display: flex;
 

  gap: 8px;


}

.buttonList >a {
  padding: 20px 28px;
  box-sizing: border-box;
  width: 162px;
  font-size: 20px;
  border-radius: 8px;
  background-color: #28c852;
  border: none;
  color: #fff;
  text-align: center;

}

.buttonList button:first-child {
  background-color: #fff;
  color: #505246;
  border: 1px solid #c8c8c8;
}

.buttonList i {
  margin-right: 8px;
}

.detailedcenter {
  width: 1200px;
  margin: auto;
  position: relative;
}

.detailedgroup {

  display: flex;
  justify-content: space-around;
  align-items: center;


}

.detailedgroup>span {
  width: 400px;
  padding: 24px 40px;
  box-sizing: border-box;
  border: 1px solid #c8c8c8;

}

.detailedimg {
  text-align: center;
}

.eventlist {
  
  position: fixed;
  bottom: 100px;
  right: calc((100% - 1150px)/2);
  display: flex;
  flex-direction: column;
  
  text-align: center;
  display:block;
  
  border-radius: 50px;
}



.eventlist span {
  
  border: 1px solid #c8c8c8;
  background: #fff;
  color:#c8c8c8;
  box-sizing: border-box;
  border-radius: 50px;
  display: block;
  margin:10px 0;
  
}


.eventlist span a{
  display:flex;
  width:60px;
  height:60px;
  justify-content: center;
  align-items: center;
  color:#c8c8c8;
  
  
  
  
}
.eventlist span a:hover{
  color:#28c852;
  border-radius: 50px;
  background-color:#505246;
 
}

.detaileditem {
  width: 1200px;
  margin: auto;
  margin-top: 80px;

}

.detaileditem>h1 {
  text-align: center;
  font-size: 24px;
}

.itemprice {
  display: flex;
  width: 1200px;
  font-size: 14px;
  
 
}

.itemprice span:nth-child(2){
  width:1000px;
  padding:16px;
  box-sizing: border-box;
  border:1px solid #838880
  
  
}

.itemprice span:first-child {
  width: 200px;
  background-color: #c8c8c8;
  padding:16px;
  box-sizing: border-box;
  border:1px solid #838880
  
 
}

.itemdelivery{
  width:1200px;
}

.itemevent{
  display:flex;
  
}
.itemevent span:nth-child(2){
  width:1000px;
  padding:16px;
  box-sizing: border-box;
  border:1px solid #838880
  
}

.itemevent span:first-child {
  width: 200px;
  background-color: #c8c8c8;
  padding:16px;
  box-sizing: border-box;
  border:1px solid #838880
  
 
}

.itemdelivery p,
.itemservis p,
.itemchange p{
  
  margin:32px 0 12px 0;
}
</style>