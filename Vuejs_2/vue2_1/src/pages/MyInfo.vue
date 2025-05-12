<template>
  <ul>
    <!-- <li>id:{{ $route.query.id }}</li>
    <li>title:{{ $route.query.title }}</li> -->
    <li>id:{{ id }}</li>
    <li>title:{{ title }}</li>
  </ul>
</template>

<script>
export default {
  name: "MyInfo",
  props: ["id", "title"]
}
</script>

<style></style>