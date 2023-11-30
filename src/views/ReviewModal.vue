<template>
  <div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1
            class="modal-title fs-5 d-flex align-items-center"
            id="exampleModalLabel"
          >
            <img
              src="https://irecipe.com/web/product/big/202307/31f491c798188d7ac94e9c9d76583953.png"
              width="52"
            />[NEW]세라마이드 유자 힐링 클렌징 밤
          </h1>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <!-- header -->
          <div class="mb-3 text-start">
            <label for="formGroupExampleInput" class="form-label">이름</label>
            <input
              type="text"
              class="form-control"
              id="formGroupExampleInput"
              placeholder="이름을 입력해주세요"
            />
          </div>
          <div class="mb-3 text-start">
            <label for="formGroupExampleInput" class="form-label"
              >비밀번호</label
            >
            <input
              type="text"
              class="form-control"
              id="formGroupExampleInput"
              placeholder="리뷰 등록을 위해 비밀번호를 입력해주세요"
            />
          </div>
          <div class="mb-3 text-start">
            <label for="formGroupExampleInput" class="form-label"
              >리뷰작성</label
            >

            <div class="input-group">
              <span class="input-group-text">리뷰작성</span>
              <textarea
                class="form-control"
                aria-label="With textarea"
              ></textarea>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile02" />
          </div>
          <select class="form-select" aria-label="Default select example">
            <option selected>아주 좋아요</option>
            <option value="1">아주 좋아요</option>
            <option value="2">맘에 들어요</option>
            <option value="3">보통이에요</option>
            <option value="3">그냥 그래요</option>
            <option value="3">별로에요</option>
          </select>
          <!-- footer -->
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >
            취소
          </button>
          <button type="button" class="btn btn-primary">리뷰작성</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>