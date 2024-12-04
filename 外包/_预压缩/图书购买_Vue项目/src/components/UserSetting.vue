<template>
  <Transition>
    <div class="UserSetting" v-if="UserSettingActive">
      <div class="UserSetting-body">
        <div class="User-title">
          <span>账户设置</span>
        </div>
        <div class="control-btn a1" @click="UserSettingActive = false">
          <span>关闭</span>
        </div>
        <div class="User-username">
          <p>账号:</p>
          <p>{{ ActiveUser[0] }}</p>
        </div>
        <div class="User-password">
          <p>密码:</p>
          <p>{{ ActiveUser[1] }}</p>
        </div>
        <div class="User-delete a1" @click="deleteUser(ActiveUser[0])">
          <span>删除账户</span>
        </div>
      </div>

    </div>
  </Transition>
</template>
<script setup>
import { inject, ref } from 'vue';


const UserSettingActive = inject('UserSettingActive')
const ActiveUser = inject('ActiveUser')
const UserArray = inject('UserArray')

function deleteUser(value) {
  for (let i = 0; i <= UserArray.value.length - 1; i++) {
    if (UserArray.value[i][0] == value) {
      UserArray.value.splice(i, 1)
      alert('删除成功')
      UserSettingActive = false
      ActiveUser.value = []
      break
    }
  }
}
</script>
<style scoped>
.v-enter-active,
.v-leave-active {
  transition: transform 0.3s ease;
}

.v-enter-from,
.v-leave-to {
  transform: translateX(100%);
}


.UserSetting {
  position: fixed;
  width: 300px;
  height: 100%;
  background: rgba(255, 255, 255, 0.7);
  backdrop-filter: blur(2px);
  top: 0;
  right: 0;
}

.UserSetting-body {
  height: 100%;
  padding: 15px;
  position: relative;
}

.control-btn {
  background: #ddd;
  position: absolute;
  width: 100%;
  left: 0;
  bottom: 0;
  text-align: center;
  padding: 10px 0;
}

.control-btn:hover {
  color: red;
}

.User-title {
  text-align: center;
  font-size: 22px;
}

.User-username,
.User-password {
  margin: 15px 0;
  font-size: 16px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.User-username>p:first-child,
.User-password>p:first-child {
  color: #535353;
}

.User-delete {
  text-align: center;
  padding: 10px;
  border-radius: 6px;
  background: #ff402f;
  color: #fff;
}
</style>