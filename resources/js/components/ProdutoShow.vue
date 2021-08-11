<template>
    <div class="row">
        <div class="col-9   mx-auto">
            <div class="card py-3">
                <div class="card-body row">
                    <div class="col-6">
                        <img :src="product.img_produto"
                            :alt="product.titulo" class="w-100" v-if="product.img_produto">
                    </div>
                    <div class="col-6">
                        <h2 class="card-title font-weight-bold h3">{{ product.titulo }}</h2>
                        <p class="text-secondary">
                            {{ product.descricao | truncate(numberChar) }}

                            <span v-if="product.descricao != undefined && product.descricao.length > 200" key="read">
                                <a href="#" class="text-dark" v-if="numberChar == 200" key="numberChar1"
                                    @click.prevent="numberChar= 5000">
                                    <u>Ler mais</u>
                                </a>
                                <a href="#" class="text-dark" v-else key="numberChar2" @click.prevent="numberChar= 200">
                                    <u>Ler menos</u>
                                </a>
                            </span>



                        </p>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <h4 class="font-weight-bold m-0">
                                {{ product.preco | currency('R$ ', 2, { decimalSeparator: ',', thousandsSeparator: '.' }) }}
                            </h4>

                            <div>
                                <a href="#" class="btn btn-danger px-3">
                                    <i class="fas fa-shopping-basket mr-2"></i> <strong>Checkout </strong>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>


        <RelatedProducts />


    </div>
</template>

<script>
    import RelatedProducts from './RelatedProducts'
    export default {
        data() {
            return {
                numberChar: 200,
                product: {}
            }
        },
        components: {
            RelatedProducts
        },
        props: {
            idProduct: String
        },
        mounted() {
            axios.get('/api/produtos/' + this.idProduct).then((response) => {
                this.product = response.data
            }).catch((error) => {
                console.log(error.response.data)
            })
        }
    }

</script>
