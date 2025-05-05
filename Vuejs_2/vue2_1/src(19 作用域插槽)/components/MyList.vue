<template>
  <div class="MyList">
    <table>
      <thead>
        <tr>
          <th>序号</th>
          <th>姓名</th>
          <th>年龄</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(data, index) in listdata" :key="index">
          <td>{{ data.id }}</td>
          <td>{{ data.name }}</td>
          <td>{{ data.age }}</td>
          <td>
            <slot :data="data" msg="你好" msg1="hello"></slot>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: "MyList",
  props: ["listdata"]
}
</script>

<style></style>