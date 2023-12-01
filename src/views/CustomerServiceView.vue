<template>
  <div class="container">
    <div class="banner">
      <img
        src="@/assets/image/CustomerService_banner.png"
        class="img-fluid"
        alt="bannerImg"
      />
    </div>
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <router-link class="nav-link text-bg-primary" aria-current="page" to="/customerservice">응대 절차</router-link>
      </li>
      <li class="nav-item">
        <router-link class="nav-link" aria-current="page" to="/customerservice">FAQ</router-link>
      </li>
      <li class="nav-item">
        <router-link class="nav-link" aria-current="page" to="/customerservice">문의 접수</router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "CustomerService",
};
</script>
