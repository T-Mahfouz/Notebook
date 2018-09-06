import Home from './components/Home.vue'
import About from './components/About.vue'

export default[
	{path: '/home', component: Home, props: true},
	{path: '/about', component: About, props: true},
]