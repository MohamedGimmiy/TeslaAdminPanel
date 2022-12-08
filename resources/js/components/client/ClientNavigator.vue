<template>
  <span>
    <v-app-bar  color="black" dark>
        <v-toolbar-title>
            <router-link to="/home">
                <v-img src="/assets/tesla.png" height="110px" width="200px"></v-img>
            </router-link>
        </v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn text class="hidden-sm-and-down white font-weight-bold black--text"
        @click="() => this.$router.push({name: 'Shop'})">Shop</v-btn>
        <v-btn  class="hidden-sm-and-down white font-weight-bold black--text ml-3">Order Now</v-btn>
        <v-btn v-if="auth" class="mx-3" fab dark meduim color="red"  @click="logout()">
            <font-awesome-icon icon="sign-out-alt" style="font-size:25px;"></font-awesome-icon>
        </v-btn>
    </v-app-bar>
  </span>
</template>

<script>
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
