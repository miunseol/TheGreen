<template>
  <div class="container">
    <h3>정보입력</h3>
    <form @submit.prevent="submitForm">
      <div class="name">
        <label for="name">이름</label>
        <input type="text" v-model="name" placeholder="이름을 입력해주세요"  />
      </div>
      <hr />
      <div class="id">
        <label for="id">아이디</label>
        <input type="text" v-model="id" placeholder="아이디를 입력해주세요" />
      </div>
      <hr />
      <div class="pw">
        <label for="password">비밀번호</label>
        <input
          type="password"
          v-model="password"
          placeholder="비밀번호를 입력해주세요"
        />
        <label>영문대소문자/숫자/특수문자 중 2가지 이상 조합,10자~16자</label>
      </div>
      <div class="pwfirm">
        <label for="passwordConfirm">비밀번호 확인</label>
        <input
          type="password"
          v-model="passwordConfirm"
          placeholder="비밀번호를 입력해주세요"
        />
      </div>
      <hr />
      <div class="phone">
        <label>휴대전화</label>
        <select id="mobile1" name="mobile" label="mobile">
          <option value="010">010</option>
          <option value="011">011</option>
          <option value="016">016</option>
          <option value="017">017</option>
          <option value="018">018</option>
          <option value="019">019</option>
        </select>
        -
        <input
          id="mobile2"
          name="mobile[]"
          maxlength="4"
          fw-filter="isNumber&amp;isFill"
          fw-label="휴대전화"
          fw-alone="N"
          placeholder=""
          value=""
          type="text"
        />
        -
        <input
          id="mobile3"
          name="mobile[]"
          maxlength="4"
          fw-filter="isNumber&amp;isFill"
          fw-label="휴대전화"
          fw-alone="N"
          placeholder=""
          value=""
          type="text"
        />
      </div>
      <hr />
      <div class="addressbox">
        <div class="address">
          <label>주소</label>
          <input type="text" id="postcode" placeholder="우편번호" />
          <button @click="search()">주소검색</button><br />
          <input type="text" id="roadAddress" placeholder="도로명주소" />
          <input type="text" id="jibunAddress" placeholder="지번주소" />
          <span id="guide" style="color: #000; display: none"></span>
          <input type="text" id="detailAddress" placeholder="상세주소" />
          <input type="text" id="extraAddress" placeholder="참고항목" />
        </div>
      </div>
      <h3>약관동의</h3>
      <div class="checkbox">
        <div class="form-check">
          <input
            class="form-check-input"
            type="checkbox"
            value=""
            id="flexCheckDefault"
          />
          <label class="form-check-label" for="flexCheckDefault">
            모든 약관 동의
          </label>
        </div>
        <hr />
        <div class="form-check">
          <input
            class="form-check-input"
            type="checkbox"
            value=""
            id="flexCheckChecked"
          />
          <label class="form-check-label" for="flexCheckChecked1">
            [필수] 쇼핑몰 이용약관
          </label>
        </div>
        <hr />
        <div class="form-check">
          <input
            class="form-check-input"
            type="checkbox"
            value=""
            id="flexCheckChecked"
          />

          <label class="form-check-label" for="flexCheckChecked2">
            [필수] 개인정보 수집 및 이용 동의
          </label>
        </div>
        <hr />
        <div class="form-check">
          <input
            class="form-check-input"
            type="checkbox"
            value=""
            id="flexCheckChecked"
          />
          <label class="form-check-label" for="flexCheckChecked3">
            [필수] 청약철회방침 동의
          </label>
        </div>
        <hr />
        <p>주문 내용을 확인했으며 약관에 동의합니다.</p>
      </div>
    </form>
    <button type="button" class="btn">✓ 회원가입</button>
  </div>
</template>

<script>
export default {
  name: "AddressRoad",
  methods: {
    search() {
      new window.daum.Postcode({
        oncomplete: (data) => {
          var roadAddr = data.roadAddress; // 도로명 주소 변수
          var extraRoadAddr = ""; // 참고 항목 변수

          if (data.bname !== "" && /[동|로|가]$/g.test(data.bname)) {
            extraRoadAddr += data.bname;
          }
          // 건물명이 있고, 공동주택일 경우 추가한다.
          if (data.buildingName !== "" && data.apartment === "Y") {
            extraRoadAddr +=
              extraRoadAddr !== ""
                ? ", " + data.buildingName
                : data.buildingName;
          }
          // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
          if (extraRoadAddr !== "") {
            extraRoadAddr = " (" + extraRoadAddr + ")";
          }

          // 우편번호와 주소 정보를 해당 필드에 넣는다.
          document.getElementById("postcode").value = data.zonecode;
          document.getElementById("roadAddress").value = roadAddr;
          document.getElementById("jibunAddress").value = data.jibunAddress;

          // 참고항목 문자열이 있을 경우 해당 필드에 넣는다.
          if (roadAddr !== "") {
            document.getElementById("extraAddress").value = extraRoadAddr;
          } else {
            document.getElementById("extraAddress").value = "";
          }

          var guideTextBox = document.getElementById("guide");
          // 사용자가 '선택 안함'을 클릭한 경우, 예상 주소라는 표시를 해준다.
          if (data.autoRoadAddress) {
            var expRoadAddr = data.autoRoadAddress + extraRoadAddr;
            guideTextBox.innerHTML = "(예상 도로명 주소 : " + expRoadAddr + ")";
            guideTextBox.style.display = "block";
          } else if (data.autoJibunAddress) {
            var expJibunAddr = data.autoJibunAddress;
            guideTextBox.innerHTML = "(예상 지번 주소 : " + expJibunAddr + ")";
            guideTextBox.style.display = "block";
          } else {
            guideTextBox.innerHTML = "";
            guideTextBox.style.display = "none";
          }
        },
      }).open();
    },
  },
};
</script>


<style scoped>
.container {
  display: flex;
  width: 900px;
  height: 1030px;
  padding: 16px 20px;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
  flex-shrink: 0;
}

.container > form {
  width: 100%;
}

.name > label {
  width: 100px;
  color: var(--505246, #505246);
  font-size: 12px;
  font-weight: 400;
  line-height: normal;
  margin-right: 20px;
}

.name > input {
  width: 240px;
  height: 36px;
  padding: 0px 12px;
  border: 1px solid var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff);
  font-size: 12px;
  font-weight: 400;
  line-height: normal;
}

.id > label {
  width: 100px;
  margin-right: 20px;
  color: var(--505246, #505246);
  font-size: 12px;
  font-weight: 400;
  line-height: normal;
}

.id > input {
  width: 240px;
  height: 36px;
  padding: 0px 12px;
  border: 1px solid var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff);
  font-size: 12px;
  font-weight: 400;
  line-height: normal;
}

.pw {
  margin-bottom: 32px;
  display: flex;
  align-items: center;
}

.pw > label {
  width: 100px;
  margin-right: 20px;
  color: var(--505246, #505246);
  font-size: 12px;
  font-weight: 400;
  line-height: normal;
}
.pw > label:last-child {
  margin-left: 20px;
  width: 500px;
  color: var(--24A841, #24a841);
  font-size: 12px;
  font-weight: 400;
  line-height: normal;
}

.pw > input {
  width: 240px;
  height: 36px;
  padding: 0px 12px;
  border: 1px solid var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff);
  font-size: 12px;
  font-weight: 400;
  line-height: normal;
}

.pwfirm > label {
  width: 100px;
  margin-right: 20px;
  color: var(--505246, #505246);
  font-size: 12px;
  font-weight: 400;
  line-height: normal;
}

.pwfirm > input {
  width: 240px;
  height: 36px;
  padding: 0px 12px;
  border: 1px solid var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff);
  font-size: 12px;
  font-weight: 400;
  line-height: normal;
}

.phone {
  display: flex;
  align-items: center;
}

.phone > label {
  width: 100px;
  margin-right: 20px;
  color: var(--505246, #505246);
  font-size: 12px;
  font-weight: 400;
  line-height: normal;
}
.phone > #mobile1 {
  width: 120px;
  height: 36px;
  padding: 0px 12px;
  margin-right: 8px;
  border: 1px solid var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff);
  font-size: 12px;
  font-weight: 400;
  line-height: normal;
}

.phone > #mobile2 {
  width: 120px;
  height: 36px;
  padding: 0px 12px;
  margin: 0 8px 0 8px;
  border: 1px solid var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff);
  font-size: 12px;
  font-weight: 400;
  line-height: normal;
}
.phone > #mobile3 {
  width: 120px;
  height: 36px;
  padding: 0px 12px;
  margin-left: 8px;
  border: 1px solid var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff);
  font-size: 12px;
  font-weight: 400;
  line-height: normal;
}
.address > label {
  width: 100px;
  margin-right: 20px;
}

.address > #postcode {
  width: 120px;
  height: 36px;
  padding: 0px 12px;
  margin-right: 8px;
  border: 1px solid var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff);
  font-size: 12px;
  font-weight: 400;
  line-height: normal;
}

.address > button {
  height: 36px;
  padding: 0px 16px;
  margin-bottom: 12px;

  border-radius: 4px;
  border: 1px solid var(--838880, #838880);
  background: var(--F5F5F5, #f5f5f5);
  color: var(--051809, #051809);
  font-size: 14px;
  font-weight: 400;
  line-height: normal;
}

.address > #roadAddress {
  width: 100%;
  height: 36px;
  padding: 0px 12px;
  margin-bottom: 12px;
  border: 1px solid var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff);
  font-size: 12px;
  font-weight: 400;
  line-height: normal;
}
.address > #jibunAddress {
  width: 50%;
  height: 36px;
  padding: 0px 12px;
  margin-bottom: 12px;
  border: 1px solid var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff);
  font-size: 12px;
  font-weight: 400;
  line-height: normal;
}
.address > #detailAddress {
  width: 50%;
  height: 36px;
  padding: 0px 12px;
  border: 1px solid var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff);
  font-size: 12px;
  font-weight: 400;
  line-height: normal;
}
.address > #extraAddress {
  width: 100%;
  height: 36px;
  padding: 0px 12px;
  border: 1px solid var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff);
  font-size: 12px;
  font-weight: 400;
  line-height: normal;
}

.container h3 {
  margin: 32px 0 16px 0;
  text-align: center;
  color: var(--051809, #051809);
  font-size: 18px;
  font-weight: 400;
  line-height: normal;
}
.checkbox {
  border-radius: 8px;
  border: 1px solid var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff);
}

.checkbox form-check-label {
  color: var(--505246, #505246);
  font-size: 14px;
  font-weight: 400;
  line-height: normal;
}

.checkbox p {
  margin: 14px 0 14px 20px;
  color: var(--051809, #051809);
  font-size: 14px;
  font-weight: 400;
  line-height: normal;
}

.form-check:first-child {
  color: var(--051809, #051809);
  font-size: 18px;
  font-weight: 500;
  line-height: normal;
}
.form-check {
  margin: 14px 0 14px 20px;
  color: var(--505246, #505246);
  font-size: 14px;
  font-weight: 400;
  line-height: normal;
}

.btn {
  width: 160px;
  height: 40px;
  padding-left: 26px;
  margin-top: 16px;
  display: flex;
  color: var(--EDF1D6, #edf1d6);
  font-size: 20px;
  font-weight: 700;
  line-height: normal;
  border-radius: 8px;
  background: var(--28C852, #28c852);
}

.form-check-input:checked {
  background-color: #28c852;
  border-color: #28c852;
}
</style>