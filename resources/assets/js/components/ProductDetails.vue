<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div :id="product.id" class="carousel slide carousel-fade" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div v-for="image in product.images" :key="image.url" :class="image.url===product.images[0].url?'carousel-item active':'carousel-item'">
                                        <img class="d-block w-100" :src="'/images/'+image.url" :alt="image.description">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" :href="'#'+product.id" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" :href="'#'+product.id" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h1>{{product.name}}</h1>
                            <h3><span class="badge badge-dark">$ {{product.price}}</span></h3>
                            <h3 v-if="product.stock>0"><span class="badge badge-success">Disponible</span></h3>
                            <h3 v-if="product.stock<=0"><span class="badge badge-secondary">Agotado</span></h3>
                        </div>
                        <div class="col-12">
                            <p v-html="product.description"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ProductDetails",
        data(){
            return {
                product: []
            };
        },
        mounted() {
            axios.get('/get-product/'+this.$route.params.id).then((response)=>{
                this.product = response.data;
            });
        }
    }
</script>

<style scoped>

</style>
