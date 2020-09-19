<template>        
    <div class="main-panel">
        <c-header></c-header>
        <div class="content">
            <transition name="moveInUp">
                <router-view :key="$route.fullPath"/>
            </transition>
        </div>
    </div>      
</template>

<script>
    import CHeader from './components/Header'
    import store from '@/store';
    export default {
        name: 'App',
        store,
        components: { CHeader }
    }
</script>

<style>

</style>
