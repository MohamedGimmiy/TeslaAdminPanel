import Home from './components/Home.vue';
import Category from '../js/screens/admin/category/categories.vue';
import addCategory from '../js/screens/admin/category/addCategory.vue';
import editCategory from '../js/screens/admin/category/editCategory.vue';

import Product from '../js/screens/admin/product/products.vue';
import addProduct from '../js/screens/admin/product/addProduct.vue';
import editProduct from '../js/screens/admin/product/editProduct.vue';

import HomePage from '../js/screens/client/Home.vue';

import Shop from '../js/screens/client/shop/Shop.vue';
import productDetails from '../js/screens/client/shop/productDetails.vue';
import CategoryProducts from '../js/screens/client/shop/CategoryProducts.vue';
import Cart from '../js/screens/client/shop/Cart.vue';

import Login from '../js/screens/auth/Login.vue';
import Register from '../js/screens/auth/Register.vue';

export default{
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Login
        },
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
        {
            path: '/admin/addProduct',
            component: addProduct
        },
        {
            path: '/admin/products',
            component: Product
        },
        {
            path: '/admin/editProduct',
            component: editProduct,
            props: true,
            'name': 'editProduct'
        },
        {
            path: '/home',
            component: HomePage
        },
        {
            path: '/login',
            component: Login,
            name: 'Login'
        }
        ,
        {
            path: '/register',
            component: Register,
            name: 'Register'
        },
        {
            path: '/shop',
            component: Shop,
            name: 'Shop'
        },
        {
            path: '/shop/productDetails',
            component: productDetails,
            props: true,
            name: 'productDetails'
        },
        {
            path: '/shop/category/products',
            component: CategoryProducts,
            props: true,
            name: 'CategoryProducts'
        },
        {
            path: '/shop/cart',
            component: Cart,
            name: 'Cart'
        },

    ]
}
