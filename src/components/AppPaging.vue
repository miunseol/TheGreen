<template>
  <div>
    <div v-if="pageSetting.list.length" class="page-list">
      <span
        class="left-icon"
        v-if="pageSetting.first !== null"
        color="#dfdfdf"
        @click="pageSetting.first !== null ? sendPage(pageSetting.first) : ''"
      >&lt;</span>
      <ul>
        <li
          :class="{ active: page === pageSetting.currentPage }"
          v-for="page in pageSetting.list"
          :key="page"
          @click="sendPage(page)"
        >
          {{ page }}
        </li>
      </ul>
      <span
        class="right-icon"
        v-if="pageSetting.end !== null"
        color="#dfdfdf"
        @click="pageSetting.end !== null ? sendPage(pageSetting.end) : ''"
      >
      &gt;
      </span>
    </div>
  </div>
</template>
 
<script>
  // import { ChevronsLeftIcon, ChevronsRightIcon } from "vue-feather-icons"
  export default {
    props: ["pageSetting"],
 
    components: {
      
    },
    methods: {
      sendPage(page) {
        this.$emit("paging", page)
      }
    }
  }
</script>