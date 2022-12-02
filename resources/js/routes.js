import Home from './components/Home.vue';
import Category from '../js/screens/category/categories.vue';
import addCategory from '../js/screens/category/addCategory.vue';
import editCategory from '../js/screens/category/editCategory.vue';


export default{
    mode: 'history',
    routes: [
        {
            path: '/admin',
            component: Home
        },
        {
            path: '/admin/categories',
            component: Category
        },
        {
            path: '/admin/addCategory',
            component: addCategory
        },
        {
            path: '/admin/editCategory',
            component: editCategory,
            props: true,
            'name': 'editCategory'
        },

    ]
}
