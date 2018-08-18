<template>
    <div class="card">
        <div :id="product.id" class="carousel slide carousel-fade card-img-top" data-ride="carousel">
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
        <div class="card-body row">
            <h5 class="card-title col-12">{{product.name}}</h5>
            <div class="col-6">
                <p><span class="badge badge-dark">$ {{product.price}}</span></p>
            </div>
            <div class="col-6">
                <p v-if="product.stock>0"><span class="badge badge-success">Disponible</span></p>
                <p v-if="product.stock<=0"><span class="badge badge-secondary">Agotado</span></p>
            </div>
            <router-link :to="{name: 'ProductDetails',params: {id:product.id}}" active-class="active" tag="div" class="see-more">
                <a>Ver Más <i class="fas fa-plus"></i></a>
            </router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Product",
        props: ['product']
    }
</script>

<style scoped>
    .card-body div .badge{
        font-size: 14px;
    }
    .see-more{
        border: 1px solid #ccc;
        padding: 5px;
        position: absolute;
        bottom: 0;
        right: 0;
        cursor: pointer;
    }
    .see-more:hover{
        box-shadow: 2px 2px #ccc;
    }
</style>
