<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center">
                    <h1>{{category.name}}</h1>
                    <div class="row">
                        <div v-for="product in products" :key="product.id" class="col-xs-12 col-sm-3">
                            <product :product="product"></product>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Product from './Product.vue'
    export default {
        components: {Product},
        name: "Categories",
        data(){
            return {
                products: [],
                category: []
            }
        },
        mounted(){
            axios.get('/get-products-by-category/'+this.$route.params.id).then((response)=>{
                this.products = response.data.products;
                this.category = response.data.category;
            });
        }
    }
</script>

<style scoped>

</style>
