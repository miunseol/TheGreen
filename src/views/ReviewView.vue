<template>
  <div class="MainReview">
    <h4 class="ProductReview">상품리뷰(233)</h4>
    <div class="ReviewList">
      <div class="Reviewstar">
        <h1><i class="fa-solid fa-star"></i>5.0</h1>
        <p>100%의 구매자가 이 상품을 좋아합니다.</p>
        <button
          type="button"
          class="btn btn-primary"
          data-bs-toggle="modal"
          data-bs-target="#exampleModal"
        >
          상품 리뷰 작성
        </button>
      </div>
      <div>
        <ul class="Reviewbar" >
          <li v-for="review in review" :key="review">{{ review.title }}</li>
          <li ><div class="bar"></div></li>
          <li v-for="review in review" :key="review">{{ review.number }}</li>
        </ul>
      </div>
    </div>
  </div>
  <ReviewModal />
  <div class="Photo">
    <h3>포토&동영상(412)</h3>
    <div >
      <ul class="PhotoList">
        <li  v-for="(photo,i) in photo" :key="i"><img :src="photo.path" width="140"></li>
      </ul>
    </div>
    <div class="reviewsearch"> 
      <div>
        <p>추천순</p>
        <p>최신순</p>
        <p>별점순</p>
      </div>
      <div class="serch">
        <input type="checkbox">
        <p>포토/동영상먼저보기</p>
        <input type="text" placeholder="리뷰 키워드 검색">
      </div>
    </div>
  </div>
</template>

<script>
import ReviewModal from "@/views/ReviewModal.vue";
export default {
  components: { ReviewModal },
  data() {
    return {
      review: [
        { title: "아주좋아요", number: 220 },
        { title: "맘에들어요", number: 3 },
        { title: "보통이에요", number: 0 },
        { title: "그냥그래요", number: 0 },
        { title: "별로에요", number: 0 },
        
      ],
      photo:[
        {path: "https://irecipe.com/web/product/big/202307/31f491c798188d7ac94e9c9d76583953.png"},
        {path: "https://irecipe.com/web/product/big/202307/31f491c798188d7ac94e9c9d76583953.png"},
        {path: "https://irecipe.com/web/product/big/202307/31f491c798188d7ac94e9c9d76583953.png"},
        {path: "https://irecipe.com/web/product/big/202307/31f491c798188d7ac94e9c9d76583953.png"},
        {path: "https://irecipe.com/web/product/big/202307/31f491c798188d7ac94e9c9d76583953.png"},
        {path: "https://irecipe.com/web/product/big/202307/31f491c798188d7ac94e9c9d76583953.png"},
        {path: "https://irecipe.com/web/product/big/202307/31f491c798188d7ac94e9c9d76583953.png"},
        {path: "https://irecipe.com/web/product/big/202307/31f491c798188d7ac94e9c9d76583953.png"},
      ],
    };
  },
};
</script>

<style>
* {
  padding: 0;
  margin: 0;
  border-style: none;
}
ul {
  list-style: none;
}
.MainReview {
  width: 1200px;
  margin: auto;
}
.ProductReview {
  margin: auto;
  font-size: 24px;
  padding-bottom: 20px;

  text-align: center;
  border-bottom: 1px solid #333;
}
.ReviewList {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.Reviewstar {
  width: 320px;
  height: 208px;
  display: flex;
  flex-direction: column;
  text-align: center;
  align-items: center;
  margin: 32px 0;
  padding: 16px;
  box-sizing: border-box;
  border-right: 1px solid #333;
}
i {
  font-size: 40px;
  color: #28c852;
  margin-right: 10px;
}
.Reviewstar h1 {
  font-size: 40px;
}
.Reviewstar > p {
  font-size: 14px;
  margin-top: 16px;
}
.Reviewstar > button {
  width: 142px;
  height: 36px;
  background-color: #28c852;
  color: #fff;
  margin: 40px 0 16px;
}
.Reviewstar > button:hover {
  background-color: #282882;
}
.Reviewbar {
  display: flex;
  text-align: center;
  align-items: center;
}

.bar {
  width: 592px;
  height: 12px;
  background-color: #c8c8c8;
  border-radius: 20px;
  margin: 0 10px 0 10px;
}
.Photo>h3{
  text-align: left;
  width:1200px;
  /* height:40px; */
  
  margin:32px auto 8px auto;
  border-top:1px solid #c8c8c8;
 /* outline: 1px solid red; */
 padding: 40px 0 16px 0;
}
.PhotoList{
  width:1200px;
  
  margin:auto;
  display: flex;
}

.reviewsearch{
  display: flex;
  justify-content: space-between;
}
.reviewsearch div{
  display:flex;
  margin-right:10px;
}

.reviewsearch p {
  margin-right:10px;
  cursor: pointer;
}



</style>