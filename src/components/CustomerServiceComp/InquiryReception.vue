<template>
  <div class="container">
    <section class="main">
      <nav class="navRightStickyBar d-flex flex-column">
        <h1>Nav Bar</h1>
        <p>Nav Bar</p>
      </nav>
    </section>

  </div>
</template>
<script>
export default {};
</script>
<style scoped>
section.main {
  width: 900px;
  height: 1500px;
  position: relative; 
  background-color: aliceblue;
}
.main>nav.navRightStickyBar {
  position: fixed;
  top: 560px;
  right:100px;
  width: 300px;
}
</style>
