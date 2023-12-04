<template>
  <main>
    <div class="container">
      <h2 class="subjectText">신규 회원 혜택</h2>
      <div class="imgGroup">
        <div class="imgbox">
          <img src="../assets/image/icon/coupon.png" alt="" />
        </div>
        <div class="imgbox">
          <img src="../assets/image/icon/shiping.png" alt="" />
        </div>
        <div class="imgbox">
          <img src="../assets/image/icon/hbd.png" alt="" />
        </div>
        <div class="imgbox">
          <img src="../assets/image/icon/sample.png" alt="" />
        </div>
      </div>
      <div class="textGroup">
        <div class="txtbox1">
          <p>
            <b>WELCOME!</b> <br />
            50% 할인 쿠폰 <br />
            즉시 지급 <br />
          </p>
          <p>
            FREE SHIPING <br />
            오후 12시 이전 <br />
            주문시 <b>당일배송</b><br />
          </p>
          <p>
            <b>HBD!</b> <br />
            생일 기념 10% <br />
            할인 쿠폰 증정 <br />
          </p>
          <p>
            SAMPLE <br />
            모든 구매 고객 <br />
            <b>체험 샘플 증정</b> <br />
          </p>
        </div>
        <div class="txtbox2">
          <p>최대 10,000원</p>
          <p>
            3만원 이상 <br />
            구매 시 무료 배송
          </p>
          생일이 포함된<br />
          한 달간 사용가능
          <p>
            베스트 상품 <br />
            샘플 2종 증정
          </p>
        </div>
      </div>
      <div class="loginGroup">
        <h1 class="logintxt">일반 로그인</h1>
        <div class="logintxt1">
          <div class="logintxt2">
            <input
              type="id"
              v-model="idValue"
              placeholder="아이디 또는 이메일"
            />
            <input type="password" v-model="pwValue" placeholder="비밀번호" />
          </div>
          <button
            type="button"
            class="btn btn-success"
            v-bind:disabled="idValue && pwValue == ''"
          >
            로그인
          </button>
        </div>
        <div class="joinbox">
          <div class="form-check">
            <input
              class="form-check-input checkbox-jujang"
              type="checkbox"
              value=""
            />
            <label class="form-check-label jujang" for="flexCheckDefault">
              아이디저장
            </label>
            <a href="" class="membership">회원가입 | </a>
            <router-link class="head-menu-norm" to="/recover">아이디찾기 | </router-link>
            <a href="" class="findid"></a>
            <a href="" class="passwords">비밀번호 찾기</a>
          </div>
        </div>
      </div>
      <div class="easylogin">
        <h3><a href="">간편 로그인</a></h3>
      </div>
      <div class="easylogin1">
        <a href="">비회원 주문배송조회></a>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  data() {
    return {
      idValue: "",
      pwValue: "",
    };
  },
};
</script>
<style scoped>
.container {
  text-align: center;
  width: 840px;
  height: 664px;
  margin-top: 60px;
  border-radius: 40px;
  border: 1px solid var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff);
}

.container > h2 {
  color: var(--051809, #051809);
  font-family: Noto Sans KR;
  font-size: 24px;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
}

.container > .subjectText {
  margin-top: 22px;
}

.container > .imgGroup {
  display: flex;
  width: 460px;
  justify-content: space-around;
  align-items: center;
  margin: 24px auto 4px;
  position: relative;
}

.imgbox {
  width: 110px;
  /* margin-left: 10px; */
}
.container > .imgGroup > img {
  display: block;
  display: flex;
  justify-content: space-around;
}

.container > .textGroup {
  width: 460px;
  display: flex;
  justify-content: space-around;
  /* margin-bottom: 40px; */
  flex-direction: column;
  margin: 0px auto 40px;
}

.container .txtbox1 {
  display: flex;
  width: 460px;
  color: var(--051809, #051809);
  font-family: Noto Sans KR;
  font-size: 14px;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
  justify-content: space-around;
}

.txtbox1 > p > b {
  color: #28853d;
}
.container .txtbox2 {
  display: flex;
  width: 460px;
  color: var(--051809, #051809);
  text-align: center;
  font-family: Noto Sans KR;
  font-size: 12px;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
  justify-content: space-around;
}
.container > .eventbox {
  height: 40px;
  padding: 6px 52px;
  justify-content: center;
  align-items: center;
  background: var(--FFFFFF, #fff);
  border-radius: 4px;
  border: 1px dashed var(--051809, #051809);
}
.container > .eventbox > h4 {
  color: var(--051809, #051809);
  font-family: Noto Sans KR;
  font-size: 16px;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
}

.container > .logintxt2 {
  width: 280px;
  height: 80px;
  border-radius: 4px;
  border: 1px solid var(--051809, #051809);
  background: var(--FFFFFF, #fff);
}

.loginGroup {
  width: 460px;
  height: 140px;
  margin: auto;
}

.logintxt1 {
  display: flex;
  justify-content: space-around;
}
.loginGroup .logintxt2 > input {
  display: flex;
  flex-direction: column;
  width: 280px;
  height: 32px;
  padding-left: 8px;
  border-radius: 4px;
  border: 1px solid var(--051809, #051809);
  background: var(--FFFFFF, #fff);
  margin-bottom: 4px;
}
.logintxt1 .btn {
  width: 128px;
  height: 68px;
  border-radius: 4px;
  background: var(--24A841, #24a841);
}
.loginGroup h1 {
  font-size: 24px;
}
.checkbox-jujang {
  transform: translateX(80%);
  border-radius: 50%;
}
.form-check-input:checked {
  background-color: #28c852;
  border-color: #28c852;
}

.jujang {
  transform: translateX(-70%);
  color: var(--051809, #051809);
  font-family: Noto Sans KR;
  font-size: 14px;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
}

.form-check > a {
  color: var(--051809, #051809);
  font-family: Noto Sans KR;
  font-size: 14px;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
}

.easylogin > h3 {
  color: var(--051809, #051809);
  font-family: Noto Sans KR;
  font-size: 18px;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
  margin-top: 20px;
}


.easylogin1 {
  display: flex;
  justify-content: space-around;
}
.easylogin1 > a {
  color: var(--051809, #051809);
  font-family: Noto Sans KR;
  font-size: 16px;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
  padding-top: 80px;
}
</style>
