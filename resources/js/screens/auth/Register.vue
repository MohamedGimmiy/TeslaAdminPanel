<template>
    <div class="pa-0" style="max-height: 100vh; overflow: hidden; background-color: white; height: 100vh;">
        <v-img src="/assets/tesla-specs.jpeg" height="350px" width="100vw"></v-img>
        <v-card class="mx-auto elevation-5 text-center pa-5" max-width="350"
            style="border-radius: 20px;position:relative;top:-50px">
            <v-card-subtitle class="title black--text pa-1">
                Register Now
            </v-card-subtitle>
            <v-card-subtitle class="pa-1">

            </v-card-subtitle>
            <v-text-field hide-details color="black" label="name" type="name" v-model="form.name">

            </v-text-field>
            <v-text-field hide-details color="black" label="Email" v-model="form.email">

            </v-text-field>
            <v-text-field hide-details color="black" label="Password" type="password" v-model="form.password">
            </v-text-field>
            <v-text-field hide-details color="black" label="password_confirmation" type="password" v-model="form.password_confirmation">
                </v-text-field>
            <v-card-actions>
                <v-btn color="dark" dark block rounded class="mt-4" v-on:click="handleRegisteration()">Register</v-btn>
            </v-card-actions>
            <div>
                Already a member!
                <a href="/login"  style="text-decoration: none; font-style: none;">Login Now!</a>
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
                password_confirmation: '',
                name: '',
                device_name: 'browser'
            }
        }
    },
    methods: {
        handleRegisteration(){
            axios.get('sanctum/csrf-cookie').then(response => {
                axios.post('admin/register', this.form).then(res=> {
                    axios.get('api/user').then(res=> {
                        if(res.status == 200){
                            if(this.form.email == res.data.email){
                                EventBus.$emit('authCheck');
                                this.$router.push('/admin/categories')
                            }
                        }
                    })
                });
            });
        }
    },
    mounted(){
        if(localStorage.getItem('auth') == 'true'){
            this.$router.push('/admin/products');
        }
    }
}
</script>

<style>

</style>
