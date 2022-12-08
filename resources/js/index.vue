<template >
    <v-app style="background-color:black; height:100vh;">
        <admin-navigator v-if="(authenticated && is_admin)"> </admin-navigator>
        <client-navigator v-else></client-navigator>
        <router-view></router-view>
    </v-app>
</template>

<script>
import AdminNavigator from './components/admin/AdminNavigator.vue';
import ClientNavigator from './components/client/ClientNavigator.vue';
import EventBus from './eventbus';
export default {
    components:{
        AdminNavigator,
        ClientNavigator
    },
    data: function(){
        return {
            authenticated: false,
            is_admin: false
        }
    },
    methods:{
        authCheck(){
            axios.get('api/user').then(res=> {
                if(res.status == 200){
                    this.authenticated = true;
                    localStorage.setItem('auth', true);
                    this.is_admin = res.data.is_admin
                }
                else
                    localStorage.setItem('auth', false);
            }).catch(e => {
                this.authenticated =false;
                localStorage.setItem('auth', false);
            })
        }
    },
    mounted(){
        var self = this;

        this.authCheck();
        EventBus.$on('authCheck' , (payload)=> {
            self.authCheck();
        })
    }
}
</script>

<style>

</style>
