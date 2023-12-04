<template>
  <div class="container">
    <div class="textGroup">
      <h2>아이디 찾기</h2>
      <p>가입하신 방법에 따라 아이디 찾기가 가능합니다.</p>
      <p>
        법인사업자 회원 또는 외국인 회원의 경우 법인명과 법인번호 또는 이름과
        등록번호를 입력해 주세요.
      </p>
    </div>
    <div class="memberType">
      회원유형
      <select class="form-select" aria-label="Default select example">
        <option selected>개인회원</option>
        <option value="1">One</option>
      </select>
    </div>
    <div class="form-check">
      <input
        class="form-check-input"
        type="radio"
        name="flexRadioDefault"
        id="flexRadioDefault1"
      />
      <label class="form-check-label" for="flexRadioDefault1"></label>이메일
    </div>
    <div class="form-check">
      <input
        class="form-check-input"
        type="radio"
        name="flexRadioDefault"
        id="flexRadioDefault2"
        checked
      />
      <label class="form-check-label" for="flexRadioDefault2"></label>전화번호
    </div>

    <div class="form-floating mb-3">
      <input
        type="tel"
        class="form-control"
        id="floatingInput"
        placeholder="name@example.com"
      />
      <label for="floatingInput">phone number</label>
    </div>
  </div>
</template>

<script></script>

<style scoped>
.container {
  width: 840px;
  height: 664px;
  margin-top: 60px;
  border-radius: 40px;
  border: 1px solid var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff);
}
.textGroup {
  margin-top: 80px;
  text-align: center;
}

.textGroup > h2 {
  color: var(--051809, #051809);
  font-family: Noto Sans;
  font-size: 25px;
  font-style: normal;
  font-weight: 700;
  line-height: 20px;
}

.textGroup > p {
  margin-top: 16px;
  color: var(--051809, #051809);
  font-family: Noto Sans;
  font-size: 10px;
  font-style: normal;
  font-weight: 400;
  line-height: 20px;
}
</style>
