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
    export default {
        name: 'App',
        components: { CHeader }
    }
</script>

<style>

</style>
