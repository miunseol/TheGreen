<template>
  <app-header />

  <router-view />
  <app-footer />
</template>

<script>
import AppHeader from "./components/AppHeader.vue";
import AppFooter from "./components/AppFooter.vue";

export default {
  components: {
    AppHeader,
    AppFooter,
  },
};
</script>

<style>
@import "@/assets/scss/custom.css";
</style>
