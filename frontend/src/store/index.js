import Vue from 'vue'
import Vuex from 'vuex'
import Specialty from '@/store/modules/specialty';

Vue.use(Vuex)

const modules = { Specialty };

export default new Vuex.Store({ modules } )
