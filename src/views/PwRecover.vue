<template>
  <div class="container">
    <div class="textGroup">
      <h2>비밀번호 찾기</h2>
    </div>
    <div class="memberType">
      <p>회원유형</p>
      <select class="form-select" aria-label="Default select example">
        <option selected>개인회원</option>
        <option value="1">법인회원</option>
      </select>
    </div>
    <div class="checkbox">
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
    </div>
    <div class="input-group mb-3">
      <p>아이디</p>
      <input type="text" class="form-control rounded" aria-label="Userid" />
    </div>
    <div class="input-group mb-3">
      <p>이름</p>
      <input type="text" class="form-control rounded" aria-label="Username" />
    </div>
    <div class="call">
      <form action="/action_page.php" class="callbox">
        <label for="phone">전화번호</label>
        <input
          type="tel"
          id="phone"
          name="phone"
          placeholder="Ex) 010-123-4567"
          pattern="[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}"
          required
        />
      </form>
    </div>
    <button class="btn btn-outline-secondary" type="button" id="button-addon1">
      확인
    </button>
  </div>
</template>

<script>
export default {};
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
  margin-bottom: 40px;
  font-family: Noto Sans;
  font-size: 25px;
  font-style: normal;
  font-weight: 700;
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
  border-color: var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff);
  align-items: center;
}

.callbox {
  display: flex;
  width: 480px;
  height: 40px;
  margin: auto;
  align-items: center;
  justify-content: space-between;
}

.call p {
  color: var(--051809, #051809);
  font-size: 14px;
}

.call #phone {
  width: 300px;
  height: 40px;
  border-radius: 4px;
  border: 1px solid var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff);
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