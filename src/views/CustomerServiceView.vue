<template>
  <div class="container">
    <div class="banner">
      <img
        src="@/assets/image/CustomerService_banner.png"
        class="img-fluid"
        alt="bannerImg"
      />
    </div>
    <!-- 메뉴 버튼 목록 -->
    <div
      class="d-flex justify-content-center"
      role="group"
      @click="activeBtn"
    >
      <button
        class="btn active d-flex justify-content-center align-items-center"
        aria-current="page"
        @click="activeMenu = 'procedure'"
        >응대 절차</button
      >
      <button
        class="btn d-flex justify-content-center align-items-center"
        aria-current="page"
        @click="activeMenu = 'faq'"
        >FAQ</button
      >
      <button
        class="btn d-flex justify-content-center align-items-center"
        aria-current="page"
        @click="activeMenu = 'inquiry'"
        >문의 접수</button
      >
    </div>
    <!-- 메뉴에 따른 컴포넌트 표시 -->
    <response-procedure v-if="activeMenu === 'procedure'"/>
    <f-a-question v-if="activeMenu === 'faq'"  @toInquiryReception="changeActiveMenu" />
    <inquiry-reception v-if="activeMenu === 'inquiry'"/>
  </div>
</template>

<script>
import ResponseProcedure from "../components/CustomerServiceComp/ResponseProcedures.vue";
import FAQuestion from "../components/CustomerServiceComp/FAQuestion.vue";
import InquiryReception from "../components/CustomerServiceComp/InquiryReception.vue";
export default {
  name: "CustomerService",
  components:{ResponseProcedure,FAQuestion,InquiryReception},
  data() {
    return {
      activeMenu: 'procedure', // 기본으로 'procedure' 컴포넌트를 표시
    };
  },
  methods:{
    activeBtn(e) {
      if (e.target.tagName === "BUTTON") {
        const btns = document.querySelectorAll("div.d-flex>button.btn");
        btns.forEach((btn) => {
          btn.classList.remove("active");
        });
        e.target.classList.add("active");
      }
    },
    changeActiveMenu(){
      this.activeMenu = 'inquiry';
      const btns = document.querySelectorAll("div.d-flex>button.btn");
        btns.forEach((btn) => {
          btn.classList.remove("active");
        });
        btns[2].classList.add("active");
    }
  }
};
</script>

<style scoped>
div>button {
  border-radius: 0;
  width: 200px;
  height: 60px;
  color: #505246;
  background-color: #a7d397;
  border: none;
}
div>button:hover {
  background-color: #81b36f;
}
div>button.active {
  background-color: #24a841;
  color: #ebf3e8;
}
</style>
