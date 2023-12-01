<template>
  <header>
    <div id="contents">
      <div id="top-wrap">
      <router-link to="/"><img src="../assets/logo.png" alt="" /></router-link>
      <ul id="top-menu" class="head메뉴R">
        <li><router-link to="/loginout">로그인</router-link></li>
        <li><router-link to="/mypage">마이페이지</router-link></li>
        <li><router-link to="/orderhist">주문조회</router-link></li>
        <li><router-link to="/customer">고객센터</router-link></li>
      </ul>
    </div>
    <div id="gnb-wrap">
      <ul id="gnb" class="head상단메뉴M">
        <li><router-link to="/">베스트</router-link></li>
        <li><router-link to="/">기획전</router-link></li>
        <li><router-link to="/">리빙</router-link></li>
        <li><router-link to="/">뷰티</router-link></li>
        <li><router-link to="/">패션</router-link></li>
      </ul>
      <div id="searchArea">
        <div id="searchBar">
          <input type="text" name="" id="" class="body내용설명R" placeholder="검색어를 입력하세요"/> 
          <a id="searchIcon" href=""><img src="../assets/search.png" alt=""></a>
        </div>
        <a id="cartIcon" href=""><img src="../assets/shoppingCart.png" alt=""></a>
      </div>
    </div>
    </div> 
  </header>
  <router-view />
</template>

<style scoped>
header {
  display: flex;
width: 1200px;
height: 240px;
padding: 40px 60px 0px 60px;
flex-direction: column;
align-items: flex-start;
gap: 40px;
flex-shrink: 0;
margin: auto;
outline: 1px solid blue;
}
header>div#contents {
  display: flex;
  width: 1200px;
  height: 240px;
  padding: 40px 60px 0px 60px;
  flex-direction: column;
  align-items: flex-start;
  gap: 40px;
}
#contents > div#top-wrap {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  align-self: stretch;
}
#top-wrap > ul#top-menu {
  display: flex;
  align-items: flex-start;
  gap: 28px;
}

#contents > div#gnb-wrap {
  display: flex;
  align-items: center;
  gap: 40px;
  align-self: stretch;
}
#gnb-wrap > #gnb {
  display: flex;
  align-items: flex-start;
  gap: 28px;
  flex: 1 0 0;
}
#gnb-wrap > div#searchArea {
  display: flex;
  align-items: center;
  gap: 8px;
}
#searchArea>div#searchBar{
  display: flex;
  width: 240px;
  height: 40px;
  padding: 0px 12px;
  align-items: center;
  gap: 8px;
  border-radius: 4px;
  border: 1px solid var(--C8C8C8, #c8c8c8);
  background: var(--FFFFFF, #fff);
}
#searchBar > input{
  flex: 1 0 0;
  color: var(--A3A78B, #A3A78B);
font-size: 14px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
#searchArea > cartIcon{
  display: flex;
padding: 8px;
align-items: flex-start;
gap: 10px;
}
</style>
