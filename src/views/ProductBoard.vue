<template>
  <div class="product-board">
    <!-- <div>{{$route.params.category}}</div> -->
    <product-category :category="category" />
    <product-item class="product-item" :product="product" />
    <!-- <div>{{product[1].name}}</div> -->
    <!-- <app-paging :pageSetting="pageDataSetting(total, limit, block, this.page)"
      @paging="pagingMethod"/> -->
  </div>
</template>

<script>
import ProductCategory from "@/components/ProductCategory.vue";
import ProductItem from "@/components/ProductItem.vue";
import data from "@/assets/data/data.json";
// import AppPaging from '@/components/AppPaging.vue';

const product = data;

export default {
  components: {
    ProductCategory,
    ProductItem,
    // AppPaging
  },
  props: {
    category: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      product,
    };
  },
};
</script>

<style scoped>
.product-board {
  margin: auto;
  width: 1200px;
  /* height: 1200px; */
  height: 1800px;
}
.product-item {
  width: 910px;
  height: 1115px;
  outline: 1px solid red;
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  margin: auto;
}
</style>
