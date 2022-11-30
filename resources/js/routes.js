import Home from './components/Home.vue';
import Category from '../js/screens/category/categories.vue';


export default{
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Home
        },
        {
            path: '/categories',
            component: Category
       }
    ]
}
