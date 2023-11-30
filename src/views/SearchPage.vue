<template>
  <div>
    <input
      class="Seach-input"
      type="text"
      placeholder="상품리뷰검색"
      @input="searchGroup"
    />

    <product-list :items="items" />
  </div>
</template>

<script>
import ProductList from "@/components/ProductList.vue";
import data from "../data/data.json";
const items = data;
export default {
  name: "SearchPage",
  components: { ProductList },
  data() {
    return {
      items,
    };
  },
  methods: {
    searchGroup(e) {
      let value = e.target.value;
      for (let i = 0; i < items.lenght; i++) {
        if (this.items[i].name.includes(value) == false) {
          document.querySelectorAll(".items")[i].style.display = "none";
        } else {
          document.querySelectorAll(".items")[i].style.display = "block";
        }
      }
    },
  },
};
</script>

<style scoped>
* {
  box-sizing: border-box;
}
.container {
  height: 600px;
  background-color: #3f454d;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.search-input {
  display: block;
  padding: 12px 16px;
  margin: 20px auto;
  width: 320px;
  font-size: 16px;
  outline: 0;
  border-radius: 15px;
  border: 0;
}
</style>