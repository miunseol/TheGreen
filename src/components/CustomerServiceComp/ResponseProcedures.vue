<template>
  <div class="container">
    <div class="steps text-center align-middle d-flex flex-column align-items-center">
      <p class="align-baseline head-top-menu-md" style="margin:0">고객 문의 해결 프로세스</p>
      <div class="imgSection d-flex justify-content-center align-items-center gap-3">
        <div class="stepBox text-bg-info d-flex flex-column align-items-center">
          <div class="imgBox">
            <img src="@/assets/image/icon/counselling.png" />
          </div>
          <h3 class="body-detail-menu-16B">문의 접수</h3>
          <p class="body-detail-content-lg">문의 및 불편사항 발생</p>
        </div>
        <span>&gt;</span>
        <div class="stepBox text-bg-info d-flex flex-column  align-items-center">
          <div class="imgBox">
            <img src="@/assets/image/icon/clipboardcheck.png" />
          </div>
          <h3 class="body-detail-menu-16B">상담 접수</h3>
          <p class="body-detail-content-lg">다양한 경로로 접수<br />전화, 문자, 온라인, 채팅 등</p>
        </div>
        <span>&gt;</span>
        <div class="stepBox text-bg-info d-flex flex-column align-items-center">
          <div class="imgBox">
            <img src="@/assets/image/icon/headset.png" />
          </div>
          <h3 class="body-detail-menu-16B">전문 상담</h3>
          <p class="body-detail-content-lg">통합시스템으로<br />접수 · 상담</p>
        </div>
        <span>&gt;</span>
        <div class="stepBox text-bg-info d-flex flex-column align-items-center">
          <div class="imgBox">
            <img id="imgHandShake" src="@/assets/image/icon/handshake.png" />
          </div>
          <h3 class="body-detail-menu-16B">신속 해결</h3>
          <p class="body-detail-content-lg">제품개선 및<br />소비자중심경영에 반영</p>
        </div>
      </div>
    </div>
    <div class="contents">
      <p class="body-title-norm text-center">소비자 분쟁 해결 기준</p>
      <table class="table">
        <thead>
          <tr>
            <th scope="col" class="body-content-norm">품종/해당 품목</th>
            <th scope="col" class="body-content-norm">분쟁 유형</th>
            <th scope="col" class="body-content-norm">피해 유형</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <tr>
            <th scope="row" class="body-menu-md">아동 용품</th>
            <td class="body-menu-md">
              01 구입 후 10일 이내에 정상적인 사용상태에서 발생한 성능/기능 상의
              하자로 중요한 수리를 요할 때<br />
              02 구입 후 1개월 이내에 정상적인 사용상태에서 발생한 성능/기능
              상의 하자로 중요한 수리를 요할 때<br />
              03 품질보증기간 이내에 정상적인 사용상태에서 발생한 성능/ 기능상의
              하자<br />
              04 제품 구입 시 운송과정에서 발생 된 피해<br />
              05 사업자가 제품설치 중 발생 된 피해
            </td>
            <td class="body-menu-md">
              제품교환 또는 구입가 환불<br />
              제품교환 또는 무상수리<br />
              하자발생 시 > 무상수리<br />
              수리/교환 불가능 시 > 제품 교환 또는 구입가 환급 제품교환 제품교환
            </td>
          </tr>
          <tr>
            <th scope="row" class="body-menu-md">의복류</th>
            <td class="body-menu-md">
              01 봉제불량<br />
              02 원단불량 또는 부자재불량
            </td>
            <td class="body-menu-md">무상수리 제품교환 또는 구입가 환급</td>
          </tr>
          <tr>
            <th scope="row" class="body-menu-md">화장품</th>
            <td class="body-menu-md">
              01 이물혼입<br />
              02 용량부족<br />
              03 변질/부패<br />
              04 유효기간 경과<br />
              05 품질/성능/기능 불량<br />
              06 용기 불량으로 인한 피해사고<br />
              07 부작용
            </td>
            <td class="body-menu-md">
              제품교환 또는 구입가 환급 치료비, 경비 및 일실소득 배상
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
export default {};
</script>
<style scoped>

div.steps{
  box-sizing: border-box;
  padding: 40px 0px;
  gap: 40px;
}
div.stepBox {
  width: 200px;
  height: 250px;
  padding-top: 15px;
}
.imgSection>div.stepBox:last-child{
  padding-top: 35px;
  height: 250px;
}

.stepBox >.imgBox{
  height: 100px;
}
.imgSection>div.stepBox:last-child>.imgBox{
  height: 80px;
}
.stepBox >.imgBox >img {
  display: block;
  height: 90px;
}
#imgHandShake{
  height: 60px;
}
thead > tr > th {
  min-width: 150px;
}
span {
  font-size: 48px;
  font-weight: bold;
}
</style>
