<template>
    <div class="main-panel">
        <c-header></c-header>
        <div class="content">
            <div class="row">
                <router-view/>
            </div>
        </div>

    </div>
    <!-- end main-painel -->     
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
