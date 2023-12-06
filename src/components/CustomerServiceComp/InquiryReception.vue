<template>
  <div class="container d-flex flex-column align-items-center">
    <h1 class="text-center my-3">문의 작성</h1>
    <form class="row gy-2 gx-3 align-items-center">
      <table
        class="table text-nowrap input-group-sm table-bordered border-primary"
      >
        <tr>
          <th class="table-success">상담분류</th>
          <td class="col-auto">
            <select
              class="form-select form-select-sm"
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
          <th class="table-success">제목</th>
          <td>
            <input
              type="text"
              class="form-control text-secondary"
              placeholder="제목"
              aria-label="제목"
              aria-describedby="문의 작성-제목"
            />
          </td>
        </tr>
        <tr>
          <th class="table-success">내용</th>
          <td>
            <div class="form-floating">
              <textarea
                class="form-control text-secondary"
                placeholder="내용을 적어주세요"
                style="height: 100px"
              ></textarea>
              <label>내용을 적어주세요</label>
            </div>
          </td>
        </tr>
        <tr>
          <th class="table-success">파일첨부</th>
          <td>
            <div class="">
              <input
                type="file"
                class="form-control text-secondary"
                aria-describedby="inputGroupFile"
                aria-label="Upload"
              />
            </div>
          </td>
        </tr>
      </table>
      <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>
  </div>
</template>
<script>
export default {};
</script>
<style scoped>
</style>
