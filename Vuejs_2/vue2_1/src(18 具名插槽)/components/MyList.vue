<template>
  <div class="myList">
    <slot name="top"></slot>
    <slot name="center"></slot>
    <slot name="bottom"></slot>
  </div>
</template>

<script>
export default {
  name: "MyList",
}
</script>

<style scoped>
.myList {
  background: #ccc;
  width: fit-content;

}

h2 {
  background-color: #bbb;
  text-align: center;
}

ul {
  padding-right: 40px;
}
</style>