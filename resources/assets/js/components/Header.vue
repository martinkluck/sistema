<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <router-link :to="{name: 'Home'}" class="navbar-brand" exact>BairesPuntoCom</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <router-link :to="{name: 'Home'}" active-class="active" tag="li" class="nav-item" exact>
                        <a class="nav-link">Home</a>
                    </router-link>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categorías
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <router-link v-for="category in categories" :key="category.id" :to="{name: 'Categories',params: {id:category.id}}" active-class="active" class="dropdown-item">
                                {{category.name}}
                            </router-link>
                        </div>
                    </li>
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
        name: "Header",
        data(){
            return {
                categories: []
            };
        },
        mounted(){
            axios.get('/get-categories/').then((response)=>{
                this.categories = response.data;
            });
        }
    }
</script>

<style scoped>

</style>
