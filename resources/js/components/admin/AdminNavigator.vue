<template>
    <div>

      <v-toolbar
        dark
        src="https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg"
      >

        <v-toolbar-title>Tesla AP</v-toolbar-title>

        <v-spacer></v-spacer>

        <v-btn class="mr-3"  @click="() => this.$router.push('/admin/addCategory')">
            Add Category
        </v-btn>
        <v-btn class="mr-3" @click="() => this.$router.push('/admin/categories')">
            Categories
        </v-btn>
        <v-btn  @click="() => this.$router.push('/admin/products')">
            Products
        </v-btn>
        <v-btn class="ml-3"  @click="() => this.$router.push('/admin/addProduct')">
            Add Products
        </v-btn>
        <v-btn class="mx-3" fab dark meduim color="red"  @click="logout()">
            <font-awesome-icon icon="sign-out-alt" style="font-size:25px;"></font-awesome-icon>
        </v-btn>
      </v-toolbar>
    </div>

  </template>

<script>
import EventBus from '../../eventbus';

export default {
    methods:{
        logout(){
            axios.post('admin/logout').then(res=>{
                if(res.status >= 200 && res.status <= 300){
                    alert('logged out')
                    localStorage.setItem('auth', 'false');
                    EventBus.$emit('authCheck')
                    this.$router.push({name: 'Login'});
                }
            })
        }
    }
}
</script>

<style>

</style>
