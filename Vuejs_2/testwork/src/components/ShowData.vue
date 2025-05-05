<template>
  <div class="ShowData">
    <h2>填写个人信息</h2>
    <div class="ShowDataBody">
      <div class="left">
        <form @submit.prevent>
          <label>姓名：</label>
          <!-- 输入字段预期值信息 -->
          <input type="text" placeholder="请输入姓名" v-model="name"><br>
          <fieldset>
            <label>健康信息</label><br>
            <label>身高：</label>
            <input type="text" placeholder="请输入身高" v-model="height"><br>
            <label>体重：</label>
            <input type="text" placeholder="请输入体重" v-model="weight"><br>
          </fieldset>
          <label>性别：</label>
          <input type="radio" value="男" v-model="sex">
          <label>男</label>
          <input type="radio" value="女" v-model="sex">
          <label>女</label><br>
          <label>喜爱的运动：</label><br>
          <input type="checkbox" value="篮球" v-model="sports">
          <label>篮球</label>
          <input type="checkbox" value="足球" v-model="sports">
          <label>足球</label>
          <input type="checkbox" value="羽毛球" v-model="sports">
          <label>羽毛球</label>
          <input type="checkbox" value="跑步" v-model="sports">
          <label>跑步</label><br>
          <label>地址：</label>
          <select v-model="address">
            <option value="">请选择</option>
            <option value="北京">北京</option>
            <option value="上海">上海</option>
            <option value="广州">广州</option>
          </select><br>
          <label>个人简介：</label><br>
          <textarea placeholder="请输入个人信息(采用@Change)" cols="30" rows="10" @change="introduceChange"></textarea>
          <br>
          <button type="submit">提交</button>
          <button type="reset">重置</button>


        </form>

      </div>
      <div class="right">
        <p>姓名：{{ name }}</p>
        <p>身高：{{ height }} cm</p>
        <p>体重：{{ weight }} kg</p>
        <p>性别：{{ sex }}</p>
        <p>喜爱的运动：{{ sports }}</p>
        <p>地址：{{ address }}</p>
        <p>个人信息：{{ introduce }}</p>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  name: "ShowData",
  data() {
    return {
      name: "",
      height: "",
      weight: "",
      sex: "",
      sports: [],
      address: "",
      introduce: ""
    }
  },
  methods:{
    introduceChange(e){
      this.introduce = e.target.value
    }
  }
}
</script>

<style>
.ShowData {
  border-bottom: 1px solid;
  padding-bottom: 10px;
  user-select: none;
}

h2 {
  text-align: center;
}

.ShowDataBody {
  display: flex;
}

.ShowDataBody>div {
  width: 50%;
}
</style>