import { App, plugin } from '@inertiajs/inertia-vue'
import Vue from 'vue'
import { InertiaProgress } from '@inertiajs/progress'
import {NavbarPlugin} from 'bootstrap-vue'
import {IconsPlugin} from 'bootstrap-vue'

const el = document.getElementById('app')
Vue.use(plugin)

// Bootstrap-vue Plugins injection
Vue.use(IconsPlugin)
Vue.use(NavbarPlugin)

InertiaProgress.init({
  color: '#8b3fc1'
})

new Vue({
  render: h => h(App, {
    props: {
      initialPage: JSON.parse(el.dataset.page),
      resolveComponent: name => import(`./Pages/${name}`).then(module => module.default),
    },
  }),
}).$mount(el)
