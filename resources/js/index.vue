<template>
    <div>
        <app-navigator-vue />
        <router-view></router-view>
    </div>
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
