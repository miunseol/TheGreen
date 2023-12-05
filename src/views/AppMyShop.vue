<template>
  <div class="container">
    <div id="myshopMenuList" class="leftmenu_wrap">
      <div class="menulist_1">
        <h3 class="tlt">마이페이지</h3>
        <ul>
          <li class="menu1">
            <a href="">주문내역조회</a>
          </li>
          <li class="menu2">
            <a href="">관심상품</a>
          </li>
          <li class="menu3">
            <a href="">최근본상품</a>
          </li>
        </ul>
        <hr />
      </div>
      <div class="menulist_2">
        <ul>
          <li class="menu5">
            <a href="">회원정보수정</a>
          </li>
          <li class="menu6">
            <a href=""
              >쿠폰
              <span class="count">(<span class="coupon">0</span>)</span></a
            >
          </li>
          <li class="menu7">
            <a href="">적립금</a>
          </li>
          <li class="menu9">
            <a href="">게시물 관리</a>
          </li>
          <li class="menu10">
            <a href="">배송 주소록 관리</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="fullbox">
      <div class="textbox">
        <div class="textbox1">
          <p class="user">000님은 &#91;일반회원&#93;회원이십니다.</p>
          <p>
            5,000원 이상 구매시 2%을 추가할인 받으실 수 있습니다.
            <br />
            5,000원 이상 구매시 2%을 추가할인 받으실 수 있습니다.
          </p>
        </div>
        <hr />
        <div class="textbox2">
          <p>적립금 : 0원&nbsp; | &nbsp;</p>
          <p>쿠폰 : 0개</p>
        </div>
      </div>
      <div class="moneybox">
        <div class="moneybox1">
          <ul>
            <li>
              <p>8,080원</p>
              <p>총 적립금</p>
            </li>
            <li>
              <p>3,000원</p>
              <p>사용 가능 적립금</p>
            </li>
            <li>
              <p>4,000원</p>
              <p>사용된 적립금</p>
            </li>
            <li>
              <p>1,080원</p>
              <p>미가용 적립금</p>
            </li>
            <li>
              <p>0원</p>
              <p>환불예정 적립금</p>
            </li>
          </ul>
        </div>
      </div>
      <div class="processing">
        <h3>나의 주문 처리 현황</h3>
        <p>(최근 3개월 기준)</p>
      </div>
      <div class="processingbox">
        <div class="processingbox1">
          <ul>
            <li>
              <p>0</p>
              <p>입금전</p>
            </li>
            <li>
              <p>0</p>
              <p>배송준비중</p>
            </li>
            <li>
              <p>0</p>
              <p>배송중</p>
            </li>
            <li>
              <p>2</p>
              <p>배송완료</p>
            </li>
          </ul>
        </div>
        <div class="processingbox2">
          <div class="processingbox2text">
            <p>취소</p>
            <p>0</p>
          </div>
          <div class="processingbox2text">
            <p>교환</p>
            <p>0</p>
          </div>
          <div class="processingbox2text">
            <p>반품</p>
            <p>0</p>
          </div>
        </div>
      </div>
      <div class="recentlybox">
        <div class="recently">
          <h3>최근본상품</h3>
          <p>더보기 &gt;</p>
        </div>
        <hr />
        <p>최근본 상품 내역이 없습니다.</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
}

.container {
  position: relative;
  width: 1200px;
  height: 1100px;
  margin: auto;
}

.container > #myshopMenuList {
  width: 200px;
  height: 540px;
  margin-top: 66px;
}

.container .menulist_1 > h3 {
  font-size: 20px;
  font-weight: 700;
  line-height: normal;
  margin-bottom: 64px;
}

.container .menulist_1 li {
  margin-bottom: 28px;
}
.container .menulist_1 li > a {
  color: #424242;
  font-size: 16px;
  font-style: normal;
  font-weight: 500;
  line-height: normal;
}

.container .menulist_2 li {
  margin-top: 29px;
}

.container .menulist_2 li > a {
  color: #424242;
  font-size: 16px;
  font-style: normal;
  font-weight: 500;
  line-height: normal;
}

.container > .fullbox {
  position: absolute;
  top: 0px;
  left: 315px;
}

.container > .fullbox > .textbox {
  width: 820px;
  height: 230px;
  padding: 20px;
  border: 1px solid var(--C8C8C8, #c8c8c8);
  background: var(--F5F5F5, #f5f5f5);
  display: flex;
  flex-direction: column;
}
.container > .fullbox .textbox1 {
  display: flex;
  flex-direction: column;
}

.textbox1 > .user {
  margin-bottom: 32px;
  color: var(--838880, #838880);
  font-size: 16px;
  font-weight: 400;
  line-height: normal;
}

.textbox1 > p {
  line-height: 32px;
  margin-bottom: 25px;
  color: var(--051809, #051809);
  font-style: normal;
  font-weight: 400;
}

.textbox2 {
  display: flex;
  margin-top: auto;
  color: var(--505246, #505246);
  font-size: 14px;
  font-weight: 400;
}

.container .moneybox {
  display: flex;
  width: 820px;
  height: 135px;
  margin-top: 52px;
  justify-content: center;
  align-items: center;
  background: var(--F5F5F5, #f5f5f5);
}

.moneybox1 {
  display: flex;
}
.moneybox1 > ul {
  width: 820px;
  justify-content: space-around;
  display: flex;
}
.moneybox1 li {
  width: 100px;
  text-align: center;
}
.moneybox1 li > p:first-child {
  font-size: 24px;
  font-weight: 400;
  line-height: normal;
  margin-bottom: 4px;
}
.moneybox1 li > p:last-child {
  font-size: 12px;
  font-weight: 400;
  line-height: normal;
}

.processing {
  margin: 76px 0 32px 0;
  display: flex;
}

.processing > h3 {
  margin-right: 20px;
  font-size: 24px;
  font-weight: 700;
  line-height: normal;
}

.processing > p {
  color: var(--C8C8C8, #c8c8c8);
  font-size: 16px;
  font-weight: 400;
  line-height: normal;
  padding-top: 8px;
}

.processingbox {
  width: 820px;
  height: 180px;
  background: var(--F5F5F5, #f5f5f5);
  display: flex;
  align-content: center;
}

.processingbox1 {
  display: flex;
}

.processingbox1 > ul {
  width: 628px;
  height: 180px;
  display: flex;
  justify-content: space-around;
  align-items: center;
}

.processingbox1 li {
  width: 80px;
  text-align: center;
}

.processingbox1 > ul p:first-child {
  color: var(--051809, #051809);
  font-size: 26px;
  font-weight: 500;
  line-height: normal;
  margin-bottom: 4px;
}

.processingbox1 > ul p:last-child {
  color: var(--051809, #051809);
  font-size: 16px;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
}

.processingbox2 {
  width: 192px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}

.processingbox2 > .processingbox2text {
  display: flex;
  padding-top: 16px;
}

.processingbox2 p:first-child {
  margin-right: 16px;
}

.recentlybox {
  width: 820px;
  height: 120px;
}

.recently {
  margin: 56px 0 32px 0;
  display: flex;
  justify-content: space-between;
}
.recently > h3 {
  color: var(--051809, #051809);
  font-size: 24px;
  font-weight: 700;
  line-height: normal;
}
.recently > p {
  padding-top: 6px;
  color: var(--C8C8C8, #c8c8c8);
  font-size: 16px;
  font-weight: 400;
  line-height: normal;
}

.recentlybox > p {
  margin-top: 24px;
  color: var(--051809, #051809);
  font-size: 18px;
  font-weight: 400;
  line-height: normal;
}
</style>