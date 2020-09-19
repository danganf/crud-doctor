require('./bootstrap')

import Vue from 'vue'
import App from './App'
import router from './router'
import Snotify from 'vue-snotify'

Vue.config.productionTip = false

Vue.use(Snotify);

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
