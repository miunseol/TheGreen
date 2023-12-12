<template>
  <div class="container">
    <div class="textGroup">
      <h2>아이디 찾기</h2>
      <p>
        · 가입하신 방법에 따라 아이디 찾기가 가능합니다.
        <br />
        · 법인사업자 회원 또는 외국인 회원의 경우 법인명과 법인번호 또는 이름과
        등록번호를 입력해 주세요.
      </p>
    </div>
    <div class="memberType">
      <p>회원유형</p>
      <select class="form-select custom-form-control-secondary" aria-label="Default select example">
        <option selected>개인회원</option>
        <option value="1">법인회원</option>
      </select>
    </div>
    <div class="checkbox">
      <div class="form-check">
        <input
          @click="callNumber = 'email'"
          class="form-check-input"
          type="radio"
          name="flexRadioDefault"
          id="flexRadioDefault1"
        />
        <label class="form-check-label" for="flexRadioDefault1">이메일</label>
      </div>
      <div class="form-check">
        <input
          @click="callNumber = 'call'"
          class="form-check-input"
          type="radio"
          name="flexRadioDefault"
          id="flexRadioDefault2"
          checked
        />
        <label class="form-check-label" for="flexRadioDefault2">전화번호</label>
      </div>
    </div>
    <form>
      <div class="input-group mb-3">
        <p>이름</p>
        <input
          type="text"
          class="form-control custom-form-control-secondary rounded"
          aria-label="Username"
          required
        />
      </div>
      <div class="call">
        <div class="callbox">
          <div class="one" v-if="callNumber == 'call'">
            <label for="phone">전화번호</label>
            <input
              type="tel"
              id="phone"
              class = "form-control custom-form-control-secondary"
              name="phone"
              placeholder="예: 010-1234-5678"
              pattern="[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}"
              required
            />
          </div>
          <div class="one" v-if="callNumber == 'email'">
            <label for="email">이메일 </label>
            <input
              type="email"
              id="email"
              class = "form-control custom-form-control-secondary"
              name="email"
              placeholder=" @ "
              required
            />
          </div>
        </div>
      </div>
      <button class="btn btn-outline-secondary" type="input" id="button-addon1">
        확인
      </button>
    </form>
  </div>
</template>


<script>
export default {
  data() {
    return {
      callNumber: "call",
    };
  },
  methods: {
    call() {
      if (this.callNumber == "call") {
        return;
      } else {
        this.callNumber = "email";
      }
    },
  },
};
</script>

<style scoped>
.container {
  width: 840px;
  height: 600px;
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
  margin-bottom: 16px;
  font-family: Noto Sans;
  font-size: 25px;
  font-style: normal;
  font-weight: 700;
  line-height: 20px;
}

.textGroup > p {
  color: var(--051809, #051809);
  margin-bottom: 32px;
  font-family: Noto Sans;
  font-size: 10px;
  font-style: normal;
  line-height: 20px;
}
.memberType {
  display: flex;
  justify-content: space-between;
  width: 480px;
  height: 40px;
  margin: auto;
}

.memberType > p {
  color: var(--051809, #051809);
  font-family: Noto Sans;
  font-size: 14px;
  font-weight: 400;
  display: flex;
  width: 100px;
  height: 40px;
  flex-direction: column;
  justify-content: center;
}
.memberType > .form-select {
  display: flex;
  width: 300px;
  height: 40px;
  padding: 0px 12px;
  align-items: center;
  border: 1px solid var(--C8C8C8, #c8c8c8);
  border-radius: 4px;
  /* background: var(--FFFFFF, #FFF); */
}

.checkbox {
  display: flex;
  margin: 8px 0;
  padding-left: 70px;
  justify-content: center;
}

.form-check {
  align-items: center;
  margin-right: 12px;
}

.input-group {
  /* outline: 1px solid red; */
  /* display: flex; */
  width: 480px;
  height: 40px;
  align-items: center;
  margin: auto;
}
.input-group > p {
  color: var(--051809, #051809);
  font-size: 14px;
  width: 180px;
  height: 6px;
  align-items: center;
}
.input-group > .form-control {
  width: 300px;
  height: 40px;
  border-radius: 4px;
  /* border-color: var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff); */
  align-items: center;
}

.callbox {
  display: flex;
  width: 480px;
  height: 60px;
  margin: auto;
  align-items: center;
  justify-content: space-between;
}
.one {
  width: 480px;
  display: flex;
  justify-content: space-between;
}
.one label {
  color: var(--051809, #051809);
  font-family: Noto Sans;
  font-size: 14px;
  font-weight: 400;
  display: flex;
  width: 100px;
  height: 40px;
  flex-direction: column;
  justify-content: center;
}

.call p {
  color: var(--051809, #051809);
  font-size: 14px;
}

.call #phone {
  width: 300px;
  height: 40px;
  border-radius: 4px;
  /* border: 1px solid var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff); */
  padding: 0px 12px;
}
.call #email {
  width: 300px;
  height: 40px;
  border-radius: 4px;
  /* border: 1px solid var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff); */
  display: flex;
  padding: 0px 12px;
  align-items: center;
}

#button-addon1 {
  display: flex;
  width: 480px;
  height: 60px;
  margin: 32px auto;
  justify-content: center;
  align-items: center;
  border-radius: 8px;
  border: 1px solid var(--A3A78B, #a3a78b);
  background: var(--28C852, #28c852);
}
.form-check-input:checked {
  background-color: #28c852;
  border-color: #28c852;
}
</style>
