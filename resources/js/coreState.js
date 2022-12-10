import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate';


Vue.use(Vuex)

export default new Vuex.Store({
    strict: true,
    plugins: [createPersistedState({
        storage: window.sessionStorage
    })],
    state: {
        cartItems: []
    },
    mutations: { // reducers as in react
        addItemToCart(state, payload){
            let cartItems = state.cartItems
            cartItems.push(payload)
            state.cartItems = cartItems
        },
        removeItemFromCart(state,payload){
            let itemsToBeRemoved = payload;
            state.cartItems = state.cartItems.filter(item => itemsToBeRemoved.id !== item.id);
        }
    },
    getters: {
        getCartItems(state){
            return state.cartItems;
        },
        removeItemFromCart(state, payload){
            state.commit('removeItemFromCart', payload)
        }
    },
    actions: {
        addItemToCart(state, payload){
            state.commit('addItemToCart', payload);
        }
    },
    modules: {

    }
});
