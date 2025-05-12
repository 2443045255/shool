import AboutView from "@/pages/AboutView.vue";
import HomeView from "@/pages/HomeView.vue";
import MyInfo from "@/pages/MyInfo.vue";
import MyMessage from "@/pages/MyMessage.vue";
import MyNews from "@/pages/MyNews.vue";
import VueRouter from "vue-router";

const router = new VueRouter({
  routes: [
    {
      path: "/Home",
      component: HomeView,
      children: [
        {
          path: "MyNews",
          component: MyNews
        },
        {
          path: "MyMessage",
          component: MyMessage,
          children: [
            {
              name: "Info",
              // query 路径
              // path:"MyInfo",
              // params 路径,
              path: "MyInfo/:id/:title",
              component: MyInfo,
              // 可以接收到params中的所有数据
              // props: true
              // 将props写出函数
              props({ params: { id, title } }) {
                return {
                  id: id,
                  title: title
                }
              }
            }
          ]
        },
      ]
    },
    {
      path: "/About",
      component: AboutView
    },
  ]
})

export default router