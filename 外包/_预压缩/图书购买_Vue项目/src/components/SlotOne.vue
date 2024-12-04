<template>
  <div class="bookli">
    <div class="bookli-img">
      <slot name="img"></slot>
    </div>
    <div class="bookli-txt">
      <div class="bookli-title">
        <slot name="title"></slot>
      </div>
      <div class="bookli-writer">
        <span>作者:</span>
        <slot name="writer"></slot>
      </div>
      <div class="bookli-type">
        <span>状态:</span>
        <slot name="type"></slot>
      </div>
      <div class="bookli-time">
        <slot name="time"></slot>
      </div>
    </div>
  </div>
</template>
<style scoped>
.bookli {
  display: flex;
  border-radius: 6px;
  padding: 5px;
  transition: .2s;
  height: fit-content;
}

.bookli:hover {
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  transform: scale(1.05);
}

.bookli-img {
  border-radius: 4px;
  overflow: hidden;
  margin-right: 10px;
  width: 40%;
}

.bookli-txt {
  width: calc(60% - 10px);
  font-size: 14px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.bookli-title {
  font-size: 16px;
}

.bookli-writer,
.bookli-type,
.bookli-time {
  color: #717171;
}
</style>