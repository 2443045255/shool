var formData = new FormData()
var getData = ''
function fetchToPhp(type, username, password) {
  formData.append("type", type)
  formData.append("username", username)
  formData.append("password", password)
  // console.log(formData)
  fetch("/admin/api/api.php", {
    method: "POST",
    body: formData,
  })
    .then(response => {
      return response.text()
    })
    .then(data => {
      getData = JSON.parse(data)
      返回数据(type, username)
    })
    .catch(error => console.error("Error:", error));
}
function 返回数据(type, username) {
  if (getData.status == 'error') {
    alert(getData.message)
    if (getData.message == '密码错误多次，已禁用登录') {
      return false
    }
    if (type == 'reg' || type == 'login') {
      submit_btn.removeAttribute('disabled')
    }
    return false
  }
  alert(getData.message)
  if (type == 'reg') {
    sessionStorage.setItem("username", username)
    location.href = 'login.php'
  } else if (type == 'login') {
    sessionStorage.setItem("username", username)
    sessionStorage.setItem("isLogin", true)
    location.href = 'user.php'
  }
}
function password检查() {
  var password = document.getElementById('password')
  var two_password = document.getElementById('two_password')
  if (two_password) {
    if (password.value != two_password.value) {
      alert("两次输入的密码不一致")
      return false
    }
  }
}
function 获取用户信息() {
  formData.append("type", 'getUserInfo')
  formData.append("username", sessionStorage.getItem('username'))
  fetch("/admin/api/api.php", {
    method: "POST",
    body: formData,
  })
    .then(response => response.json())
    .then(data => {
      if (data.status == 'success') {
        user_loginRec_body.innerHTML = ''
        for (let i = 0; i <= data.login_records_result_Arr.length - 1; i++) {
          var user_loginRec_item = document.createElement('div')
          user_loginRec_item.className = 'user_loginRec_item'
          user_loginRec_item.innerHTML = `<p>${data.login_records_result_Arr[i]['login_time']}</p><p>${data.login_records_result_Arr[i]['login_ip']}</p>`
          user_loginRec_body.append(user_loginRec_item)
        }
      }
    })
    .catch(error => console.error("Error:", error));
}
function 退出登录() {
  alert("退出成功")
  sessionStorage.setItem('isLogin', false)
  location.href = 'login.php'
}
function 修改密码(username, old_password, new_password) {
  formData.append("type", 'change_password')
  formData.append("username", username)
  formData.append("password", old_password)
  formData.append("new_password", new_password)
  fetch("/admin/api/api.php", {
    method: "POST",
    body: formData,
  })
    .then(response => response.json())
    .then(data => {
      getData = data
      if (返回数据('change_password', username) == false) return
      if (data.status == 'success') {
        退出登录()
      }
    })
    .catch(error => console.error("Error:", error));
}