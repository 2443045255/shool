<template>
  <div class="col-card-main">
    <div class="col-card">
      <div class="col-card-img">
        <slot name="col-card-img"></slot>
      </div>
      <div class="col-card-txt">
        <div class="col-card-title">
          <slot name="col-card-title"></slot>
        </div>
        <div class="col-card-text">
          <slot name="col-card-text"></slot>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>
.col-card-main {
  transition: .3s;
  width: fit-content;
  background: #ddd;
  padding: 10px;
  border-radius: 6px;
  margin: 0 5px;
  margin-bottom: 10px;
}

.col-card-img {
  height: 120px;
  width: 230px;
  border-radius: 6px;
  overflow: hidden;
}
.col-card-txt{
  margin-top: 5px;
}
.col-card-text{
  color: rgb(139, 139, 139);
}
</style>