<template>
  <div>
    <h2>Home组件内容</h2>
    <div>
      <ul class="nav nav-tabs">
        <li>
          <router-link class="list-group-item" active-class="active" to="/Home/MyNews">News</router-link>
        </li>
        <li>
          <router-link class="list-group-item" active-class="active" to="/Home/MyMessage">Message</router-link>
        </li>
      </ul>
      <div>
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "HomeView"
}
</script>

<style></style>