<template>
    <v-app>
        <app-navigator-vue />
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
