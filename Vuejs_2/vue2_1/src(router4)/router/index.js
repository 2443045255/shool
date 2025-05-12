import MyPage1 from "@/pages/MyPage1.vue";
import MyPage2 from "@/pages/MyPage2.vue";
import MyPage3 from "@/pages/MyPage3.vue";
import VueRouter from "vue-router";

const router = new VueRouter({
  routes: [
    {
      path: "/MyPage1",
      component: MyPage1
    },
    {
      path: "/MyPage2",
      component: MyPage2
    },
    {
      path: "/MyPage3",
      component: MyPage3
    },
  ]
})

export default router