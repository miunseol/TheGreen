<template>
  <header>
    <div class="row container d-flex flex-column justify-contents-center align-items-center mx-auto">
      <div class="col d-flex justify-content-between align-items-center">
      <router-link to="/"><img src="../assets/logo.png" alt="" /></router-link>
      <ul class="list-unstyled d-flex align-middle gap-3">
        <li><router-link class="head-menu-norm" to="/login">로그인</router-link></li>
        <li><router-link class="head-menu-norm" to="/appmyshop">마이페이지</router-link></li>
        <li><router-link class="head-menu-norm" to="/">주문조회</router-link></li>
        <li><router-link class="head-menu-norm" to="/customerservice">고객센터</router-link></li>
      </ul>
    </div>
    <!-- 링크 쿼리 -->
    <div class="col d-flex justify-content-between align-items-center gap-3">
      <ul id="shopMenu" class="list-unstyled d-flex align-items-center gap-3">
        <li v-for="nav in navigations" :key="nav.name" class="head-top-md"><router-link :to="{name: 'product', params: {category: nav.name}}">
          <span>{{ nav.name }}</span>
        </router-link></li>
        
      </ul>
      <div class="d-flex align-items-center gap-2">
        <div class="input-group">
          <input
            type="text"
            class="form-control text-secondary"
            placeholder="검색어를 입력하세요"
          />
          <a id="searchIcon" href="" class="input-group-text"
            ><img src="../assets/search.png" alt=""
          /></a>
        </div>
        <router-link id="cartIcon" to="/shoppingcart"
          ><img src="../assets/shoppingCart.png" alt=""
        /></router-link>
      </div>
    </div>
    </div>

  </header>
</template>
<script>
  
  export default {
    
    data(){
      return{
        // category:[
        //   '0','1','2','3','4'
        // ],
        navigations:[
          {name : 'BEST'},
          {name : '기획전'},
          {name : '리빙상품'},
          {name : '뷰티상품'},
          {name : '패션상품'},
          
        ],
      }
    }
  }
</script>
<style scoped>
ul#shopMenu > li {
  line-height: 68px;
}
li>a{
  padding: 20px 4px;
  height: 100%;
}
header {
  background-color: #f8f9fa;
}
</style>
