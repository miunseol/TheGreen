<template>
  <header class="d-flex justify-content-center align-items-center px-5">
    <div class="container py-3">
      <div class="row">
        <div class="col d-flex justify-content-between align-items-end">
          <router-link to="/"><img src="../assets/logo.png" alt="" /></router-link>
          <ul class="list-unstyled d-flex align-items-start gap-3">
            <li><router-link to="/loginout">로그인</router-link></li>
            <li><router-link to="/mypage">마이페이지</router-link></li>
            <li><router-link to="/orderhist">주문조회</router-link></li>
            <li><router-link to="/customer">고객센터</router-link></li>
          </ul>
        </div>
        <div class="col d-flex align-items-center gap-3">
          <ul class="list-unstyled d-flex align-items-start gap-3">
            <li><router-link to="/">베스트</router-link></li>
            <li><router-link to="/">기획전</router-link></li>
            <li><router-link to="/">리빙</router-link></li>
            <li><router-link to="/">뷰티</router-link></li>
            <li><router-link to="/">패션</router-link></li>
          </ul>
          <div class="d-flex align-items-center gap-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="검색어를 입력하세요">
              <a id="searchIcon" href="" class="input-group-text"><img src="../assets/search.png" alt=""></a>
            </div>
            <a id="cartIcon" href=""><img src="../assets/shoppingCart.png" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>