<template>
    <div>
        <Header></Header>
        <div class="container">
            <transition
                name="slide"
            >
                <router-view/>
            </transition>
        </div>
        <Footer></Footer>
    </div>
</template>

<script>
    import Header from './components/Header.vue';
    import Footer from './components/Footer.vue';
    export default {
        name: "App",
        components: {Header,Footer}
    }
</script>

<style scoped>

</style>
