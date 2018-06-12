<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">BairesPuntoCom</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <router-link :to="{name: 'Home'}" active-class="active" tag="li" class="nav-item" exact>
                        <a class="nav-link">Home</a>
                    </router-link>
                    <router-link :to="{name: 'Contact'}" active-class="active" tag="li" class="nav-item">
                        <a class="nav-link">Contacto</a>
                    </router-link>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
    export default {
        name: "Header"
    }
</script>

<style scoped>

</style>
