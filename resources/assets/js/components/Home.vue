<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <img class="card-img-top" src="/img/home.jpg" alt="Card image cap">
                <div class="card-body text-center">
                    <h1>Últimos Productos</h1>
                    <div class="row">
                        <div v-for="product in productos" :key="product.id" class="col-xs-12 col-sm-3">
                            <product :product="product"></product>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'
    import Product from './Product.vue'
    export default {
        components: {Product},
        computed: mapGetters([
            'products'
        ]),
        data(){
            return {
                productos: []
            };
        },
        mounted(){
            console.log(this.products);
            axios.get('/get-products').then((response)=>{
                console.log(response);
                this.productos = response.data;
            });
        }
    }
</script>

<style scoped>

</style>
