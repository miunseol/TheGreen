<template>
  <div class="">
    <section class="mainmenu d-flex flex-column align-items-center">
      <h1 class="head-top-menu-md">키워드로 FAQ를 검색할 수 있습니다</h1>
      <div class="searchmenu d-flex justify-content-center align-items-start">
        <section
          class="searchBox d-flex flex-column justify-content-end align-items-center"
        >
          <div
            class="searchBar d-flex justify-content-center align-items-center"
          >
            <input
              type="text"
              class="form-control custom-form-control-secondary"
              placeholder="주문한 제품의 배송 상태를 어떻게 확인하나요?"
              aria-label="question-search"
              aria-describedby="faq-inputText"
            />
            <button type="button" class="btn">검색</button>
          </div>
          <a class="d-flex body-title-bd pe-3" @click="$emit('toInquiryReception')">원하는 질문이 없나요? 직접 문의해보세요!</a>
        </section>
        <section class="category d-flex flex-column align-items-start">
          <div class="filter d-flex justify-content-between align-items-center">
            <span class="body-title-norm">주문/배송</span>
            <div class="options d-flex align-items-center align-self-stretch">
              <span class="body-detail-content-lg">제품 상세</span>
              <span class="body-detail-content-lg">배송 조회</span>
            </div>
          </div>
          <div class="filter d-flex justify-content-between align-items-center">
            <span class="body-title-norm">교환/환불</span>
            <div class="options d-flex align-items-center align-self-stretch">
              <span class="body-detail-content-lg">교환 요청</span>
              <span class="body-detail-content-lg">환불 요청</span>
            </div>
          </div>
          <div class="filter d-flex justify-content-between align-items-center">
            <span class="body-title-norm">내 정보</span>
            <div class="options d-flex align-items-center align-self-stretch">
              <span class="body-detail-content-lg">회원 정보 약관</span>
              <span class="body-detail-content-lg">정보 변경</span>
              <span class="body-detail-content-lg">회원 탈퇴</span>
            </div>
          </div>
        </section>
      </div>
    </section>
    <h1 class="head-top-menu-md text-center">교환/배송/환불</h1>
    <section class="faqList d-flex flex-column align-items-start">
      <article class="d-flex align-items-center align-self-stretch">
        <img src="@/assets/image/icon/counselling.png" alt="question-icon" />
        <div
          class="content d-flex flex-column align-items-start align-self-stretch"
        >
          <span class="body-menu-norm"
            >Q: 제품을 주문하면 언제 배송이 시작되나요?</span
          >
          <span class="body-title-bd"
            >A: 주문이 확인되면 24시간 이내에 배송이 시작됩니다.</span
          >
        </div>
      </article>
      <article class="d-flex align-items-center align-self-stretch">
        <img src="@/assets/image/icon/counselling.png" alt="question-icon" />
        <div
          class="content d-flex flex-column align-items-start align-self-stretch"
        >
          <span class="body-menu-norm">Q: 제품의 환불 정책은 무엇인가요?</span>
          <span class="body-title-bd">
            A: 제품 수령 후 14일 이내에 환불 요청을 하실 수 있습니다.</span
          >
        </div>
      </article>
      <article class="d-flex align-items-center align-self-stretch">
        <img src="@/assets/image/icon/counselling.png" alt="question-icon" />
        <div
          class="content d-flex flex-column align-items-start align-self-stretch"
        >
          <span class="body-menu-norm">Q: 제품에 어떤 성분이 들어있나요?</span>
          <span class="body-title-bd">
            A: 각 제품의 상세 정보 페이지에서 성분 목록을 확인하실 수
            있습니다.</span
          >
        </div>
      </article>
      <article class="d-flex align-items-center align-self-stretch">
        <img src="@/assets/image/icon/counselling.png" alt="question-icon" />
        <div
          class="content d-flex flex-column align-items-start align-self-stretch"
        >
          <span class="body-menu-norm">Q: 비회원도 주문이 가능한가요?</span>
          <span class="body-title-bd">
            A: 네, 비회원 분들도 주문이 가능합니다. 하지만 회원으로 가입하시면
            다양한 혜택을 받으실 수 있습니다.</span
          >
        </div>
      </article>
      <article class="d-flex align-items-center align-self-stretch">
        <img src="@/assets/image/icon/counselling.png" alt="question-icon" />
        <div
          class="content d-flex flex-column align-items-start align-self-stretch"
        >
          <span class="body-menu-norm"
            >Q: 주문한 제품의 배송 상태를 어떻게 확인하나요?</span
          >
          <span class="body-title-bd">
            A:
            <router-link class="linkInTxt text-primary" to="/"
              >주문 내역 조회</router-link
            >에서 현재 주문 상태를 확인하실 수 있습니다.</span
          >
        </div>
      </article>
    </section>
  </div>
</template>
<script>
export default {};
</script>
<style scoped>
.container * {
  box-sizing: border-box;
  /* outline: 1px solid salmon; */
}

section.mainmenu {
  padding-top: 50px;
  padding-bottom: 20px;
  gap: 50px;
  border-bottom: 1px solid #24a841;
  margin-bottom: 20px;
}
/* .mainmenu > .searchmenu {
    width: 1200px;
  } */
.searchmenu > .searchBox {
  padding-top: 30px;
  gap: 10px;
}
.searchBox > .searchBar {
  gap: 10px;
}
.searchBar > input.form-control {
  width: 480px;
  height: 40px;
  padding: 0px 20px;
  gap: 8px;
}
.searchBar > button {
  width: 60px;
  padding: 8px 0;
  gap: 8px;
  background-color: #24a841;
  color: #ebf3e8;
}
.searchBar > button:hover {
  background-color: var(--bs-primary-dark);
}
.searchBox > p {
  width: 300px;
  height: 20px;
}
section.category {
  /* width: 600px; */
  padding-left: 24px;
}
.category > div.filter {
  /* width: 600px; */
  height: 50px;
}
.filter > span {
  width: 80px;
}
.filter > .options {
  width: 450px;
  padding-left: 10px;
  padding-right: 30px;
  gap: 15px;
}
.options > span {
  width: 80px;
}

/* section.faqList *{
  outline: 1px solid salmon;
} */
section.faqList {
  margin-top: 20px;
  gap: 10px;
}
.faqList > article {
  background-color: #f8f9fa;
  padding: 20px 50px 20px 30px;
  gap: 50px;
}
article > img {
  width: 90px;
}
article > div.content {
  gap: 10px;
}
</style>
