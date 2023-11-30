<template>
  <div class="p-list">
    <div class="items" v-for="(item, i) in this.items" :key="i">
      <img :src="item.image" :alt="item.type" class="item_thumbnail" />
      <span class="item_decription">
        {{ item.gender }},{{ item.size }}-{{ itemd.name }}
      </span>
    </div>
  </div>
</template>

<script>
export default {
  name:"ProductList",
  props:["items"],
};
</script>

<style scoped>
 *{
    box-sizing: border-box;
  }
  .p-list{
    width:80%;
    height:60%;
    border:1px solid red;
    overflow-y:scroll;
  }
  .items{
    background-color:#fff;
    display:flex;
    align-items: center;
    padding:10px;
    margin-bottom:10px;
  }

  .item_thumbnail{
    width:50px;
    height:50px;
    margin-right: 10px;
  }
</style>