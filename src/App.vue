<template>
  <app-header/>
  <div id="container">
  </div>
  <app-footer/>
</template>

<script>
import AppHeader from "./components/AppHeader.vue";
import AppFooter from "./components/AppFooter.vue";
export default{
  components:{
    AppHeader,AppFooter,
  }
}
</script>
<style>
@import "./assets/css/reset.css";
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  width: 100%;
  text-align: center;
  color: #2c3e50;
}

nav#header{
  width: 1200px;
  margin: auto;

  display: flex;
  justify-content: space-between;
  align-items: center;
}
nav#header a {
  font-weight: bold;
  color: #2c3e50;
  text-decoration: none;
  padding-right: 30px;
}

nav a.router-link-exact-active {
  color: #42b983;
}
</style>
