<template>
  <div class="container">
    <div class="main d-flex flex-column align-items-center">
      <h1 class="body-title-30norm pt-5">장바구니</h1>
      <section class="cartList d-flex flex-column align-items-start">
        <table
          class="table cartDetail text-nowrap table-group-divider align-items-center align-self-stretch"
        >
          <thead>
            <tr>
              <th scope="col" class="headTag body-content-md text-center">
                이미지
              </th>
              <th scope="col" class="headTag body-content-md">상품 정보</th>
              <th scope="col" class="headTag body-content-md text-center">
                수량
              </th>
              <th scope="col" class="headTag body-content-md">구매 금액</th>
              <th scope="col" class="headTag body-content-md">할인 금액</th>
              <th scope="col" class="headTag body-content-md">배송 구분</th>
              <th scope="col" class="headTag body-content-md">배송비</th>
              <th scope="col" class="headTag body-content-md text-center">
                선택
              </th>
            </tr>
          </thead>
          <tbody class="table-group-divider align-middle">
            <tr>
              <td class="text-center">
                <img
                  :src="this.cartList.dmstc.productList[0].src"
                  alt="상품 이미지"
                />
              </td>
              <td class="body-menu-md">
                {{ this.cartList.dmstc.productList[0].name }}
              </td>
              <td>
                <div
                  class="btn-group-sm d-flex justify-content-center align-items-center"
                >
                  <button
                    class="btn btn-outline-secondary"
                    v-on:click="quantityChange(-1)"
                  >
                    <img src="@/assets/symbol_minus.png" alt="수량 빼기" />
                  </button>
                  <p
                    class="border border-outline-secondary text-center body-content-md"
                  >
                    {{ quantityCount }}
                  </p>
                  <button
                    class="btn btn-outline-secondary"
                    v-on:click="quantityChange(1)"
                  >
                    <img src="@/assets/symbol_plus.png" alt="수량 더하기" />
                  </button>
                </div>
              </td>

              <td id="totalPrice" class="body-menu-md">{{ totalPrice }} 원</td>
              <td class="body-content-md">0 원</td>
              <td class="body-content-md">기본배송</td>
              <td class="body-content-md">3,000 원</td>
              <td class="d-flex flex-column gap-1">
                <button class="btn btn-outline-primary body-content-md">
                  주문하기
                </button>
                <button class="btn btn-outline-primary body-content-md">
                  선물하기
                </button>
                <button class="btn btn-outline-secondary body-content-md">
                  관심상품 등록
                </button>
                <button class="btn btn-outline-warning body-content-md">
                  &times; 삭제
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </section>

      <div
        class="selectsOption d-flex justify-content-between align-items-center align-self-stretch"
      >
        <p class="body-content-md text-start" style="color: #28853d">
          * 할인 적용 금액은 주문서작성의 결제예정금액에서 확인 가능합니다
        </p>
        <div class="clearPrint d-flex align-items-center">
          <button class="btn btn-outline-secondary">
            <span class="body-content-norm">장바구니 비우기</span>
          </button>
          <button class="btn btn-outline-secondary">
            <span class="body-content-norm">견적서 출력</span>
          </button>
        </div>
      </div>
      <div class="totalSummary text-left">
        <section
          class="totalSummary-Header body-content-md d-flex justify-content-between w-100 gap-5"
        >
          <p>총 상품 금액</p>
          <p>총 배송비</p>
          <p>결제 예정 금액</p>
          <p>적립 예정 금액</p>
        </section>
        <section
          class="totalSummary-contents body-title-30norm d-flex justify-content-between w-100 gap-5"
        >
          <p>{{ totalPrice }}<b class="body-title-norm"> 원</b></p>
          <p>+0<b class="body-title-norm"> 원</b></p>
          <p class="text-primary">= {{ totalPrice }}<b class="body-title-norm"> 원</b></p>
          <p class="body-title-norm">최대<b class="body-title-30norm text-warning"> 900 원</b></p>
        </section>
      </div>
      <div
        class="payBtn d-flex justify-content-center align-items-start align-self-stretch"
      >
        <button class="btn btn-outline-secondary">선물하기</button>
        <button class="btn btn-outline-primary">주문하기</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ShoppingCart",
  components: {},
  mounted() {
    this.updateData();
  },
  data() {
    return {
      cartList: {
        dmstc: {
          count: 1,
          productList: [
            {
              src: require("@/assets/product_extra_small.jpg"),
              name: "[NEW] 세라마이드 유자 힐링 클렌징 밤",
              quantity: 1,
              price: 19200,
              total: 19200,
            },
          ],
        },
        ovss: {
          count: 0,
        },
      },
      quantityCount: 0,
      totalPrice: 0,
    };
  },
  methods: {
    quantityChange(diff) {
      let amount = this.cartList.dmstc.productList[0].quantity + diff;
      if (amount < 1) {
        amount = 1;
      }
      this.cartList.dmstc.productList[0].total =
        amount * this.cartList.dmstc.productList[0].price;
      this.cartList.dmstc.productList[0].quantity = amount;
      this.updateData();
      return;
    },
    updateData() {
      this.quantityCount = this.cartList.dmstc.productList[0].quantity;
      this.totalPrice =
        this.cartList.dmstc.productList[0].total.toLocaleString("ko-KR");
      console.log(this.totalPrice);
      return;
    },
  },
};
</script>

<style scoped>
div.container > div.main {
  gap: 40px;
}
.main > section.cartList {
  gap: 20px;
}

div.deliverTypeMenu {
  width: 100%;
}

.cartList {
  width: 1200px;
}
.cartList > div.deliverTypeMenu > span {
  padding: 24px 40px;
}
div.btn-group-sm > p {
  width: 32px;
  height: 31px;
  line-height: 26px;
}

div.tableBody > div:last-child {
  gap: 4px;
}
div.tableBody > div:last-child > button:first-child {
  background-color: #28c852;
}

.main > p {
  width: 100%;
}

td#totalPrice {
  width: 120px;
}
div.selectsOption > div {
  gap: 20px;
}
div.selectsOption button {
  padding: 8px 16px;
}

div.totalSummary {
  width: 1200px;
}

div.totalSummary p,
div.totalSummary h3 {
  width: 200px;
}

div.payBtn {
  gap: 12px;
}
</style>
