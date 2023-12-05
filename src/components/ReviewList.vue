<template>
  <div class="p-list">
    <div class="items" v-for="(item, i) in this.items" :key="i">


      <div class="itemList">
        <div class="reviewall">
          <div>
            <h2>{{ item.score }}</h2>
            <p>{{ item.data }}</p>
          </div>

          <p><b>{{ item.review }}</b></p>
          <div class="reviewimg">
            <img :src="item.image" :alt="item.type">
          </div>
          <div class="reviewhelp"></div>
        </div>
        <div class="reviewname">
          <p><b>{{ item.name }}</b></p>
          <p>{{ item.type }}</p>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  name: "ProductList",
  props: ["items"],
};
</script>

<style scoped>
* {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}

.p-list {
  width: 100%;
  height: 60%;


}

.items {
  background-color: #fff;
  display: flex;
  align-items: center;
  padding: 10px;
  margin-bottom: 10px;
}

.item_thumbnail {
  width: 50px;
  height: 50px;
  margin-right: 10px;
}

.itemList {
  border-top: 1px solid #c8c8c8;
  width: 1200px;

  display: flex;
  justify-content: space-between;
  margin: auto;

}

.reviewall>div {
  display: flex;
  justify-content: space-between;

}

.reviewall {
  width: 880px;

  margin: 32px 0;
  padding: 8px 0;
  box-sizing: border-box;
}

.reviewall div {
  width: 840px;

}

.reviewimg>img {
  width: 120px;
  height: 120px;
  border-radius: 8px;
}

.reviewall p {
  text-align: left;
}

.reviewname {
  width: 320px;
  margin-top: 32px;
  border-left: 1px solid #c8c8c8;
}
</style>