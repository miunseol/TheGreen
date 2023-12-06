<template>
  <div class="order-title">

    <h1>주문서 작성</h1>
    <div class="background-w">
      <div class="order-if">
        <h3>주문정보</h3>
        <button><i class="fa-solid fa-chevron-up"></i></button>
      </div>
      <div class="order-eventtitle">
        <div class="order-event">
          <span class="d-flex">주문자</span>
          <span><input type="text" placeholder="주문자 정보"></span>
        </div>
        <div class="order-event">
          <span class="d-flex">이메일</span>
          <span><input type="text" placeholder=""></span>
          <p>@</p>
          <select class="order-sel">
            <option v-for="(option, i) in options" :key="i">{{ option }}</option>
          </select>
        </div>
        <div class="order-event">
          <span class="d-flex">휴대전화</span>
          <select class="order-sel">
            <option v-for="(te, i) in tes" :key="i">{{ te }}</option>
          </select>
          <P>-</P>
          <span><input type="tel"></span>
          <P>-</P>
          <span><input type="tel"></span>
        </div>
        <div class="order-event">
          <span class="d-flex">주소</span>
          <div class="order-add">
            <span class="order-button">
              <input class="order-num" type="text" v-model="postcode" placeholder="우편번호">
              <input type="button" @click="execDaumPostcode()" value="우편번호 찾기">
            </span>

            <span>
              <input class="order-addr" type="text" id="address" placeholder="주소"><br>
            </span>
            <span>

              <input class="order-inpu" type="text" id="detailAddress" placeholder="상세주소">

            </span>
          </div>
        </div>




      </div>
    </div>
    <div class="background-w">
      <div class="delivery-ad">
        <div class="order-if">
          <h3>배송지</h3>
          <button><i class="fa-solid fa-chevron-up"></i></button>
        </div>

        <div class="order-eventtitle">

          <div class="delivery-checkbox">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
              <label class="form-check-label" for="flexRadioDefault2">
                주문자 번호와 동일
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
              <label class="form-check-label" for="flexRadioDefault2">
                새로운 배송지
              </label>
            </div>
          </div>
          <div class="order-event">
            <span class="d-flex">주문자</span>
            <span><input type="text" placeholder="주문자 정보"></span>
          </div>
          <div class="order-event">
            <span class="d-flex">이메일</span>
            <span><input type="text" placeholder=""></span>
            <p>@</p>
            <select class="order-sel">
              <option v-for="(option, i) in options" :key="i">{{ option }}</option>
            </select>
          </div>
          <div class="order-event">
            <span class="d-flex">휴대전화</span>
            <select class="order-sel">
              <option v-for="(te, i) in tes" :key="i">{{ te }}</option>
            </select>
            <P>-</P>
            <span><input type="tel"></span>
            <P>-</P>
            <span><input type="tel"></span>
          </div>
          <div class="order-event">
            <span class="d-flex">주소</span>
            <div class="order-add">
              <span class="order-button">
                <input class="order-num" type="text" v-model="postcode" placeholder="우편번호">
                <input type="button" @click="execDaumPostcode()" value="우편번호 찾기">
              </span>

              <span>
                <input class="order-addr" type="text" id="address" placeholder="주소"><br>
              </span>
              <span>

                <input class="order-inpu" type="text" id="detailAddress" placeholder="상세주소">

              </span>
            </div>

          </div>
          <div class="order-event">
            <span class="d-flex">배송메세지</span>
            <select class="order-sel">
              <option v-for="(message, i) in deliverymessage" :key="i">{{ message }}</option>
            </select>
          </div>

        </div>



      </div>
    </div>





    <div class="background-w">
      <div class="order-product">
        <div class="order-if">
          <h3>주문상품</h3>
          <button><i class="fa-solid fa-chevron-up"></i></button>
        </div>
        <div class="order-imgflex">
          <div><img src="https://irecipe.com/web/product/big/202312/e9a74467a95a075c5dcc08ef06dbe08e.png"
              style="width:100px;"></div>
          <div class="order-imgcol">
            <div class="order-imgbtw">
              <span>제품명이 표출됩니다</span>
              <span><i class="fa-solid fa-x"></i></span>
            </div>
            <span>수량 1개</span>
            <span>19,200원</span>

          </div>

        </div>

      </div>
      <div class="delivery-product">
        <span>배송비</span>
        <span>0원(무료)</span>
      </div>
    </div>


    <div class="background-w">
      <div class="order-sale">
        <div class="order-if">
          <h3>할인/부가결제</h3>
          <button><i class="fa-solid fa-chevron-up"></i></button>
        </div>
        <div class="sale-flex">
          <span>할인코드</span>
          <input type="text" id="sale">
          <label type=button id="sale">적용</label>


        </div>

      </div>
      <div class="delivery-product">
        <span>적용금액</span>
        <span>- 0원</span>
      </div>
    </div>
    <div class="background-w">
      <div class="order-payproduct">
        <div class="order-if">
          <h3>할인/부가결제</h3>
          <button><i class="fa-solid fa-chevron-up"></i></button>
        </div>
        <div class="order-payflex">
          <div>
            <div class="order-payall">
              <span>주문상품</span>
              <span>19,200원</span>
            </div>
            <div class="order-payall">
              <span>배송비</span>
              <span>+0원</span>
            </div>
            <div class="order-payall">
              <span>할인/부가결제</span>
              <span>-0원</span>
            </div>
            <div class="order-inputpay">
              <span>적용금액</span>
              <span>- 0원</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="background-w">
      <div class="order-payif">
        <div class="order-if">
          <h3>할인/부가결제</h3>
          <button><i class="fa-solid fa-chevron-up"></i></button>
        </div>
        <div class="paypadding">
          <div class="payallflex">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
              <label class="form-check-label" for="flexRadioDefault2">
                카드 결제
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
              <label class="form-check-label" for="flexRadioDefault2">
                에스크로(실시간 계좌이체)
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
              <label class="form-check-label" for="flexRadioDefault2">
                휴대폰 결제
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
              <label class="form-check-label" for="flexRadioDefault2">
                무통장 입금
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
              <label class="form-check-label" for="flexRadioDefault2">
                카카오 페이
              </label>
            </div>
          </div>
          <span class="paytext">소액 결제의 경우 PG사 정책에 따라 결제 금액 제한이 있을 수 았습니다.</span>
        </div>
      </div>
    </div>
    <div class="background-w">
      <div class="all-conditions">
        <div class="form-check" id="checkonly">
          <div>
            <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled">
            <label class="form-check-label" for="flexCheckCheckedDisabled">
              모든 약관 동의
            </label>
          </div>
        </div>
        <div>
          <div class="form-check" id="checkonly">
            <div>
              <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled">
              <label class="form-check-label" for="flexCheckCheckedDisabled">
                [필수] 쇼핑몰 이용약관 동의
              </label>
            </div>
            <span><i class="fa-solid fa-caret-right"></i></span>
          </div>
        </div>
        <div>
          <div class="form-check" id="checkonly">
            <div>
              <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled">
              <label class="form-check-label" for="flexCheckCheckedDisabled">
                [필수] 개인정보 수집 및 이용 동의
              </label>
            </div>
            <span><i class="fa-solid fa-caret-right"></i></span>
          </div>
        </div>
        <div>
          <div class="form-check" id="checkonly">
            <div>
              <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled">
              <label class="form-check-label" for="flexCheckCheckedDisabled">
                [필수] 청약철회방침 동의
              </label>
            </div>
            <span><i class="fa-solid fa-caret-right"></i></span>
          </div>
        </div>
      </div>
      <div class="form-span" id="checkonly">
        <span>주문 내용을 확인했으며 약관에 동의합니다.</span>
      </div>
    </div>
    <div>
      <button class="allbutton" type="button">19,200원 결제하기</button>
    </div>
    <span class="button-text">-무이자할부가 적용되지 않은 상품과 무이자할부가 가능한 상품을 동시에 구매할 경우 전체 주문 상품 금액에 대해 무이자할부가 적용되지 않습니다. 무이자할부를 원하시는 경우 장<br>바구니에서 무이자할부
      상품만 선택하여 주문하여 주시기 바랍니다.
      <br><br>-최소 결제 가능 금액은 결제금액에서 배송비를 제외한 금액입니다.</span>
  </div>
</template>

<script>
export default {
  data() {
    return {
      postcode: "",
      address: "",
      extraAddress: "",
      options:
        [
          "naver.com",
          "kakao.com",
        ],
      tes: ["010", "031", "070", "011",],
      deliverymessage: ["(선택 입력)", "집앞에 놓고가주세요", "잘부탁드립니다", "꼼꼼히 포장해주세요"]
    };
  },
  methods: {
    execDaumPostcode() {
      new window.daum.Postcode({
        oncomplete: (data) => {
          if (this.extraAddress !== "") {
            this.extraAddress = "";
          }
          if (data.userSelectedType === "R") {
            // 사용자가 도로명 주소를 선택했을 경우
            this.address = data.roadAddress;
          } else {
            // 사용자가 지번 주소를 선택했을 경우(J)
            this.address = data.jibunAddress;
          }

          // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
          if (data.userSelectedType === "R") {
            // 법정동명이 있을 경우 추가한다. (법정리는 제외)
            // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
            if (data.bname !== "" && /[동|로|가]$/g.test(data.bname)) {
              this.extraAddress += data.bname;
            }
            // 건물명이 있고, 공동주택일 경우 추가한다.
            if (data.buildingName !== "" && data.apartment === "Y") {
              this.extraAddress +=
                this.extraAddress !== ""
                  ? `, ${data.buildingName}`
                  : data.buildingName;
            }
            // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
            if (this.extraAddress !== "") {
              this.extraAddress = `(${this.extraAddress})`;
            }
          } else {
            this.extraAddress = "";
          }
          // 우편번호를 입력한다.
          this.postcode = data.zonecode;
        },
      }).open();
    },
  },
}


</script>

<style scoped>
.order-title {

  width: 1200px;

  display: flex;
  padding-bottom: 60px;
  flex-direction: column;
  align-items: center;
  gap: 20px;
  background-color: #c8c8c8;
  margin: auto;
}

.background-w {
  width: 900px;
  background-color: #fff;
  border-radius: 4px;
  ;
}

.order-title h1 {

  font-size: 30px;
  margin: 60px 0 40px 0;

}

.order-if {
  width: 900px;

  display: flex;
  justify-content: space-between;
  margin: auto;
  padding: 8px 20px;
  border-bottom: 1px solid #c8c8c8
}

.order-if h3 {
  font-size: 18px;
}

.order-eventtitle {
  width: 900px;

  padding: 16px 20px;

  margin: auto;
  line-height: 16px;



}

.order-event {
  display: flex;
  align-items: flex-start;
  gap: 20px;
  align-self: stretch;
  margin-bottom: 16px;






}

.d-flex {
  width: 100px;
  height: 40px;
  font-size: 12px;
  padding: 12px 0;
  box-sizing: border-box;

}

.order-event input {
  border: 1px solid black;
  width: 200px;
  height: 40px;
  padding: 0 12px;
  align-items: center;
  border-radius: 4px;

}

.order-event p {
  width: 18px;
  height: 20px;
  padding: 12px 0;
  box-sizing: border-box;
}



.order-sel {
  width: 200px;

  height: 40px;
  text-align: center;
  box-sizing: border-box;
  border: 1px solid black;
  border-radius: 4px;
  padding: 0 10px;

}


.order-add {

  width: 744px;
  height: 144px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 12px;


}

.order-add input {
  margin-right: 10px;
  width: 600px;
  padding: 0 12px;
  box-sizing: border-box;

}

.order-button input {
  width: 150px;
}

.order-button input:nth-child(1) {
  background-color: #c8c8c8;
  color: #838883;
}

.order-addr {
  background-color: #c8c8c8;
  color: #838883;
}

.order-button input:nth-child(2) {
  color: #fff;
  background-color: #28c852;
}

.order-button input:nth-child(2):hover {
  color: #fff;
  background-color: #28853d;
}

.delivery-checkbox {
  display: flex;
  width:900px;
  height:36px;
  padding:4px 0 ;
  box-sizing: border-box;
  
  align-items: center;
  gap: 20px;
  
  margin:8px 12px;
 

}

.delivery-checkbox input {
  width:20px;
  height:20px;
}

.delivery-checkbox label{
  padding:7px 0;
  box-sizing: border-box;
}

.order-product {

  border-radius: 4px;
}

.order-imgflex {
  display: flex;
  padding: 16px 20px;
  box-sizing: border-box;
  gap: 20px;
}

.order-imgflex>div>img {
  border: 1px solid #c8c8c8;
}


.order-imgcol {
  display: flex;
  justify-content: space-around;
  flex-direction: column;
}

.order-imgbtw {
  width: 730px;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}

.delivery-product {
  width: 860px;
  padding: 12px 20px;
  box-sizing: border-box;
  font-size: 16px;
  display: flex;
  justify-content: space-between;
  margin: 0px 20px 16px 20px;
  background-color: #c8c8c8;


}



.sale-flex {
  width: 860px;
  height: 36px;
  margin: 16px 20px 12px 20px;
  display: flex;
  align-items: flex-start;
  gap: 20px;
  align-self: stretch;
}

.sale-flex span {
  font-size: 14px;
  padding: 4px 0;
  align-items: center;
}

.sale-flex input {
  border: 1px solid #c8c8c8;

}

.sale-flex label {
  display: flex;
  padding: 0px 10px;
  box-sizing: border-box;
  height: 24px;
  align-items: center;
  background-color: #838883;
  justify-content: center;
  border-radius: 4px;
  ;
  cursor: pointer;

}

.order-payflex {

  padding: 16px 20px;
  box-sizing: border-box;
}

.order-payall {
  display: flex;
  justify-content: space-between;
  font-size: 14px;
  color: #838883;
  padding: 8px 0;
}

.order-inputpay {
  display: flex;
  justify-content: space-between;
  padding: 12px 20px;
  box-sizing: border-box;
  font-size: 16px;

  
  background-color: #c8c8c8;
}

.paypadding {
  
  padding: 16px 20px;

}

.payallflex {
 
  display: flex;
  
  gap:20px;
  font-size: 14px;
  color: #051809;
}

.form-check-input {
  color: #24a841;

}

.paytext {
  font-size: 12px;
  color: #838880;
}

.all-conditions {
  border-radius: 8px;
  display: flex;
  flex-direction: column;

}

#checkonly{
  width: 900px;
  border-bottom: 1px solid #c8c8c8;
  font-size: 14px;
  padding: 8px 20px;
  box-sizing: border-box;
  display: flex;
  justify-content: space-between;



}
#checkonly>div {
  margin-left: 20px;
}

.form-span {
  width: 900px;

  font-size: 14px;
  padding: 8px 20px;
  box-sizing: border-box;

}

.allbutton {
  width: 900px;

  height: 72px;
  padding: 0 40px;
  background-color: #28c852;
  color: #fff;
  border-radius: 8px;
  font-size: 20px;
}

.button-text{
  width:900px;
  margin:auto;
  font-size:12px;
  color:#838880;
}

</style>




