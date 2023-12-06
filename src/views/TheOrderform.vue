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
            <input type="checkbox" name="samedelivery" id="samedelivery">
            <label id="samedelivery">기존 번호와 동일</label>
            <input type="checkbox" name="newdelivery" id="newdelivery">
            <label id="newdelivery">새로운 배송지</label>
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
    <div class="order-product"></div>
    <div class="order-sale"></div>
    <div class="order-"></div>
    <div class="order-payif"></div>
    <div class="payment-method"></div>
    <div class="all-conditions"></div>

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
      deliverymessage: ["(선택 입력)","집앞에 놓고가주세요", "잘부탁드립니다", "꼼꼼히 포장해주세요"]
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
  gap: 60px;
  background-color: #c8c8c8;
  margin:auto;
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
  align-items: flex-start;
  gap: 20px;
  align-self: stretch;
  margin:16px 0 12px 0;
 
}

.delivery-checkbox input{
  border-radius: 50px;
}
</style>




