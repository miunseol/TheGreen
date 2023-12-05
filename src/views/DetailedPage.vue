<template>
  <div id=header class="detailed-main">
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
        <button>장바구니</button>
        <button><i class="fa-solid fa-gift"></i>선물하기</button>
        <button>바로 구매</button>
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
      <span><a href=#header></a>TOP</span>
      <span>REVIEW</span>
      
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

.buttonList button {
  padding: 20px 28px;
  box-sizing: border-box;
  width: 162px;
  font-size: 20px;
  border-radius: 8px;
  background-color: #28c852;
  border: none;
  color: #fff;

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

.eventlist{
  position: fixed;
  top:400px;
  right:40px;
  display:flex;
  flex-direction: column;
  gap:10px;
  
}
.eventlist span{
  border:1px solid #c8c8c8;
  background:#fff;
  padding:20px;
  box-sizing: border-box;
  border-radius: 8px;
  display: block;
}
</style>