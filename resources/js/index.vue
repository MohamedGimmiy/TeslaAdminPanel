<template >
    <v-app style="background-color:black; height:100vh;">
        <app-navigator-vue> </app-navigator-vue>
        <router-view></router-view>
    </v-app>
</template>

<script>
import AppNavigatorVue from './components/AppNavigator.vue';
export default {
    components:{
        AppNavigatorVue
    }
}
</script>

<style>

</style>
