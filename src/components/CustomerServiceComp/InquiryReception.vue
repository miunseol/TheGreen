<template>
  <div class="d-flex flex-column align-items-center">
    <h1 class="text-center body-title-30norm my-3">문의 작성</h1>
    <form class="row gy-2 gx-3 align-items-center">
      <table
        class="table text-nowrap input-group-sm table-borderless"
      >
        <tr>
          <!-- <th class="table-success pt-0 body-title-bd">상담분류</th> -->
          <td class="col-auto pt-0">
            <select
              class="form-select form-select-sm custom-form-control-secondary body-content-md"
              aria-label="Small select"
            >
              <option selected>상담 유형</option>
              <option value="1">아동 용품</option>
              <option value="2">의복류</option>
              <option value="3">화장품</option>
              <option value="3">구매/결제</option>
              <option value="3">기타</option>
            </select>
          </td>
        </tr>
        <tr>
          <!-- <th class="table-success body-title-bd">제목</th> -->
          <td class ="pt-0">
            <input
              type="text"
              class="form-control custom-form-control-secondary body-content-md"
              placeholder="제목"
              aria-label="제목"
              aria-describedby="문의 작성-제목"
            />
          </td>
        </tr>
        <tr>
          <!-- <th class="table-success body-title-bd">내용</th> -->
          <td class="pt-0">
            <div class="form-floating">
              <textarea
                class="form-control custom-form-control-secondary text-secondary body-content-md"
                placeholder="내용을 적어주세요"
                style="height: 100px"
              ></textarea>
              <label class="body-content-md">내용을 적어주세요</label>
            </div>
          </td>
        </tr>
        <tr>
          <!-- <th class="table-success body-title-bd  ">파일첨부</th> -->
          <td class="pt-0">
            <div class="">
              <input
                type="file"
                class="form-control custom-form-control-secondary text-secondary body-content-md"
                aria-describedby="inputGroupFile"
                aria-label="Upload"
              />
            </div>
          </td>
        </tr>
      </table>
      <button type="submit" class="btn btn-outline-primary body-content-md">문의 등록</button>
    </form>
  </div>
</template>
<script>
export default {
  data(){
  }
};
</script>
<style scoped>
button[type="submit"]:hover{
  color: #f5f5f5;
}
</style>
