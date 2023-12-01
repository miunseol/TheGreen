<template>
  <footer>
    <div id="contents">
      <section id="shopInfo">
        <h1 class="footer중요부분B">The Green</h1>
        <p class="footert설명R">
          921, Jungang-daero, Danwon-gu, Ansan-si,<br>
          Gyeonggi-do, Republic of Korea<br>
          15361
        </p>
        <h3 class="footer메뉴M">2023 Green. All rights reverved</h3>
      </section>
      <section id="bottom-menu" class="footert설명R">
        <ul class="menu-box ">
          <h2 class="footer메뉴M">Links</h2>
          <li><a href="">Home</a></li>
          <li><a href="">Shopping</a></li>
          <li><a href="">My Cart</a></li>
          <li><a href="">Customer Center</a></li>
        </ul>
        <ul class="menu-box">
          <h2 class="footer메뉴M">Help</h2>
          <li><a href="">Payment Options</a></li>
          <li><a href="">Returns</a></li>
          <li><a href="">Privacy Policies</a></li>
        </ul>
        <ul class="menu-box">
          <h2 class="footer메뉴M">SNS</h2>
          <li><a href="">Kakao Talk</a></li>
          <li><a href="">Instagram</a></li>
          <li><a href="">Twitter</a></li>
        </ul>
      </section>
    </div>
  </footer>
  
</template>

<style scoped>
footer {
  display: flex;
  width: 1920px;
  height: 520px;
  padding-top: 160px;
  justify-content: center;
  align-items: center;
  flex-shrink: 0;
  margin: auto;
}
footer > div#contents {
  display: flex;
  width: 1200px;
  height: 360px;
  padding-left: 50px;
  justify-content: center;
  align-items: flex-start;
  flex-shrink: 0;
}
#contents > section#shopInfo {
  display: flex;
  padding: 45px 130px 123px 15px;
  flex-direction: column;
  align-items: flex-start;
  gap: 47px;
  flex: 1 0 0;
}
#contents > section#bottom-menu {
  display: flex;
  width: 720px;
  height: 360px;
  padding: 45px 0px 0px 90px;
  justify-content: flex-end;
  align-items: flex-start;
  flex-shrink: 0;
}
#bottom-menu>.menu-box{
  display: flex;
flex-direction: column;
align-items: flex-start;
gap: 50px;
flex: 1 0 0;
}
</style>
