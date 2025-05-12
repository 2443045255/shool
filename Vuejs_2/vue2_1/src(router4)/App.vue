<template>
  <!-- <div>
    <div class="row">
      <div class="col-xs-offset-2 col-xs-8">
        <div class="page-header">
          <h2>Vue Router Demo</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-2 col-xs-offset-2">
        <div class="list-group">
          <router-link class="list-group-item" to="/MyAbout">About</router-link>
          <router-link class="list-group-item active" to="/MyHome">Home</router-link>
        </div>
      </div>
      <div class="col-xs-6">
        <div class="panel">
          <div class="panel-body">
            <h2>我是Home的内容</h2>
             <router-view></router-view>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <div>
    <div class="footer_wrap">
      <router-link to="/MyPage1">发现音乐</router-link>
      <router-link to="/MyPage2">我的音乐</router-link>
      <router-link to="/MyPage3">朋友</router-link>
    </div>
    <router-view></router-view>
  </div>

</template>

<script>
export default {
  name: "App",

}
</script>

<style>
body {
  margin: 0;
  padding: 0;
}

.footer_wrap {
  position: relative;
  left: 0;
  top: 0;
  display: flex;
  width: 100%;
  text-align: center;
  background-color: #333;
  color: #ccc;
}

.footer_wrap a {
  flex: 1;
  text-decoration: none;
  padding: 20px 0;
  line-height: 20px;
  background-color: #333;
  color: #ccc;
  border: 1px solid black;
}

.footer_wrap a.active,
a.router-link-exact-active {
  background-color: purple;
}

.footer_wrap a:hover {
  background-color: #555;
}
</style>