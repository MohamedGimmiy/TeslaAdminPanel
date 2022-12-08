<template>
    <div class="pa-0" style="max-height: 100vh; overflow: hidden; background-color: white; height: 100vh;">
        <v-img src="/assets/tesla-specs.jpeg" height="350px" width="100vw"></v-img>
        <v-card class="mx-auto elevation-5 text-center pa-5" max-width="350"
            style="border-radius: 20px;position:relative;top:-50px">
            <v-card-subtitle class="title black--text pa-1">
                Login Now
            </v-card-subtitle>
            <v-card-subtitle class="pa-1">

            </v-card-subtitle>
            <v-text-field hide-details color="black" label="Email" v-model="form.email">

            </v-text-field>
            <v-text-field hide-details color="black" label="Password" type="password" v-model="form.password">

            </v-text-field>
            <v-card-actions>
                <v-btn color="dark" dark block rounded class="mt-4" v-on:click="handleLogin()">Login</v-btn>
            </v-card-actions>
            <div>
                Not a member!
                <a href="/register"  style="text-decoration: none; font-style: none;">Register Now!</a>
            </div>
        </v-card>
    </div>
</template>

<script>
import EventBus from '../../eventbus';
export default {
    data: function () {
        return {
            form: {
                email: '',
                password: '',
                device_name: 'browser'
            }
        }
    },
    methods: {
        handleLogin(){
            axios.get('sanctum/csrf-cookie').then(response => {
                    axios.post('admin/login', this.form ).then(res=> {
                    axios.get('api/user').then(res=> {
                        if(res.status == 200){
                            if(this.form.email == res.data.email){
                                EventBus.$emit('authCheck');
                                this.$router.push('/admin/categories')
                            }
                        }
                    });
                });
            });
        }
    },
    mounted(){
        if(localStorage.getItem('auth') == 'true'){
            console.log('authorized')
            this.$router.push('/admin/products');
        }
    }
}
</script>

<style>

</style>
