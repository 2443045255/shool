<template>
  <div class="CountScore">
    <table class="gridtable">
      <tr>
        <th>学科</th>
        <th>分数</th>
      </tr>
      <tr>
        <td>语文</td>
        <td><input type="text" v-model.number="score.chinese"></td>
      </tr>
      <tr>
        <td>数学</td>
        <td><input type="text" v-model.number="score.math"></td>
      </tr>
      <tr>
        <td>英语</td>
        <td><input type="text" v-model.number="score.english"></td>
      </tr>
      <tr>
        <td>总分</td>
        <td><input type="text" v-model.number="sum"></td>
      </tr>
      <tr>
        <td>平均分</td>
        <td><input type="text" v-model.number="average"></td>
      </tr>

    </table>
  </div>
</template>

<script>
export default {
  name: "CountScore",
  data() {
    return {
      score: {
        chinese: "",
        math: "",
        english: "",
      },
      sum: "",
      average: 0,
    }
  },
  watch: {
    score: {
      deep: true,
      handler() {
        this.sum = this.score.chinese + this.score.math + this.score.english
        this.average = ((this.score.chinese + this.score.math + this.score.english) / 3).toFixed(2)
      }
    }
  }
}
</script>

<style scoped>
.CountScore {
  padding: 10px 0;
  border-bottom: 1px solid;
  padding-bottom: 10px;
}

table.gridtable {

  font-family: verdana, arial, sans-serif;
  font-size: 11px;
  color: #333333;
  border-width: 1px;
  border-color: #666666;
  border-collapse: collapse;
}

table.gridtable th {
  border-width: 1px;
  border-style: solid;
  padding: 8px;
  border-color: #666666;
  background-color: #dedede;
}

table.gridtable td {
  border-width: 1px;
  border-style: solid;
  padding: 8px;
  border-color: #666666;
  background-color: #ffffff;
}
</style>