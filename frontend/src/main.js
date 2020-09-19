require('./bootstrap')

import Vue from 'vue'
import App from './App'
import router from './router'
import Snotify from 'vue-snotify'
import VueSwal from 'vue-swal'

Vue.config.productionTip = false

Vue.use(Snotify)
Vue.use(VueSwal)

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
