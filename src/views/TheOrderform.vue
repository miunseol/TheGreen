<template>
  <div class="order-title">
    <h1>주문서 작성</h1>
    <div class="order-if">
      <div>
        <h3>주문정보</h3>
        <button><i class="fa-solid fa-chevron-up"></i></button>
      </div>
      <div class="order-eventtitle">
        <div class="order-event">
          <span class="d-flex">주문자<b class="d-flex align-top text-primary">*</b></span>
          <span><input type="text" placeholder="주문자 정보"></span>
        </div>
        <div class="order-event">
          <span class="d-flex">이메일<b class="d-flex align-top text-primary">*</b></span>
          <span><input type="text" placeholder=""></span>
          <p>@</p>
          <select>
            <option v-for="(option, i) in options" :key="i">{{ option }}</option>
          </select>
        </div>
        <div class="order-event">
          <span class="d-flex">휴대전화<b class="d-flex align-top text-primary">*</b></span>
          <select>
            <option v-for="(te, i) in tes" :key="i">{{ te }}</option>
          </select>
          <P>-</P>
          <span><input type="tel"></span>
          <P>-</P>
          <span><input type="tel"></span>
        </div>
        <div class="order-adevent">
          <span class="d-flex">주소<b class="d-flex align-top text-primary">*</b></span>

          <input type="text" id="postcode" placeholder="우편번호">
          <button @click="search()">우편번호 찾기</button><br>
          <input type="text" id="roadAddress" placeholder="도로명주소">
          <input type="text" id="jibunAddress" placeholder="지번주소">
          <span id="guide" style="color:#000;display:none"></span>
          <input type="text" id="detailAddress" placeholder="상세주소">
          <input type="text" id="extraAddress" placeholder="참고항목">

        </div>



      </div>
    </div>
    <div class="delivery-ad"></div>
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
      options:
        [
          "naver.com",
          "kakao.com",
        ],
      tes: ["010", "031", "070", "011",]
    }

  },
  methods: {
    search() { //@click을 사용할 때 함수는 이렇게 작성해야 한다.
      new window.daum.Postcode({
        oncomplete: (data) => { //function이 아니라 => 로 바꿔야한다.
          // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

          // 도로명 주소의 노출 규칙에 따라 주소를 표시한다.
          // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
          var roadAddr = data.roadAddress; // 도로명 주소 변수
          var extraRoadAddr = ''; // 참고 항목 변수

          // 법정동명이 있을 경우 추가한다. (법정리는 제외)
          // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
          if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
            extraRoadAddr += data.bname;
          }
          // 건물명이 있고, 공동주택일 경우 추가한다.
          if (data.buildingName !== '' && data.apartment === 'Y') {
            extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
          }
          // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
          if (extraRoadAddr !== '') {
            extraRoadAddr = ' (' + extraRoadAddr + ')';
          }

          // 우편번호와 주소 정보를 해당 필드에 넣는다.
          document.getElementById('postcode').value = data.zonecode;
          document.getElementById("roadAddress").value = roadAddr;
          document.getElementById("jibunAddress").value = data.jibunAddress;

          // 참고항목 문자열이 있을 경우 해당 필드에 넣는다.
          if (roadAddr !== '') {
            document.getElementById("extraAddress").value = extraRoadAddr;
          } else {
            document.getElementById("extraAddress").value = '';
          }

          var guideTextBox = document.getElementById("guide");
          // 사용자가 '선택 안함'을 클릭한 경우, 예상 주소라는 표시를 해준다.
          if (data.autoRoadAddress) {
            var expRoadAddr = data.autoRoadAddress + extraRoadAddr;
            guideTextBox.innerHTML = '(예상 도로명 주소 : ' + expRoadAddr + ')';
            guideTextBox.style.display = 'block';

          } else if (data.autoJibunAddress) {
            var expJibunAddr = data.autoJibunAddress;
            guideTextBox.innerHTML = '(예상 지번 주소 : ' + expJibunAddr + ')';
            guideTextBox.style.display = 'block';
          } else {
            guideTextBox.innerHTML = '';
            guideTextBox.style.display = 'none';
          }
        }
      }).open();


    }
  }

}
</script>

<style scoped>
.order-title {
  width: 1200px;
  margin: auto;
  text-align: center;
}

.order-title h1 {

  font-size: 30px;
  margin: 20px 0 40px 0;

}

.order-if>div {
  width: 900px;
  display: flex;
  justify-content: space-between;
  margin: auto;
  padding: 8px 20px;


}

.order-if h3 {
  font-size: 18px;
}

.order-eventtitle {
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
}

.order-event {
  display: flex;
}
</style>