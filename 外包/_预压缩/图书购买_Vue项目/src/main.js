import './assets/main.css'

import { createApp, ref } from 'vue'
import App from './App.vue'

const app = createApp(App)

const ActivePage = ref('HomePage')
const PageData = ref([])
const SearchTxt = ref('')
const UserArray = ref([])
const ActiveUser = ref([])
const UserSettingActive = ref(false)
app.provide('ActivePage', ActivePage)
app.provide('PageData', PageData)
app.provide('SearchTxt', SearchTxt)
app.provide('UserArray', UserArray)
app.provide('ActiveUser', ActiveUser)
app.provide('UserSettingActive', UserSettingActive)


app.mount('#app')
