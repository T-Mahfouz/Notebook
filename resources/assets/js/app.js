require('./bootstrap');

window.Vue = require('vue');

//Vue.component('compo', require('./components/compo.vue'));
import Header from './components/Header.vue'
import Footer from './components/Footer.vue'
import About from './components/About.vue'

import Home from './components/Home.vue'

import Routers from './routers'

import VueRouter from 'vue-router'
Vue.use(VueRouter);

const routers = new VueRouter({
	routes: Routers,
	mode: 'history'
});

const app = new Vue({
	'el':'#app',
	'data':{

	},
	'methods':{
		
	}, 
	'components':{
		Home,
		'Customheader' :Header,
		'Customfooter' :Footer
	},
	'computed':{},
	'watch':{},
	router: routers,
});