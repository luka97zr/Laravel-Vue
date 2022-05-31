import VueRouter from 'vue-router';
import ExampleComponent from './components/ExampleComponent';
import TestComponent from './components/TestComponent'
import Bookables from './bookables/Bookables'

const routes = [
    {
        path: "/",
        component: Bookables,
        name: 'home'
    },
    {
        path: '/test',
        component: TestComponent,
        name: 'test'

    }
]

const router = new VueRouter({
    routes, // short for 'routes: routes
    mode: 'history'
})

export default router;