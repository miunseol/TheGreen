<template>
  <div>
    <div class="category best"><!--AppHeader에서 값 가져 옵시다,,-->
      <h2>{{ category[0] }}</h2><!--AppHeader에서 값 가져 옵시다,,--> 
      <div class="category-filter">

      </div>
    </div><!--category-->
  </div>
</template>

<script>
export default {
  data(){
    return{
      category:[
        "BEST",
        "기획전",
        "리빙상품",
        "뷰티상품",
        "패션상품",
      ]
    }
  }
}
</script>

<style>

</style>