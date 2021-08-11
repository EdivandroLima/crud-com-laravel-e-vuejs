<template>
    <div class="col-9  mx-auto">
        <div class="card my-3">
            <div class="card-body row">
                <h5 class="col-12 card-title font-weight-bold">Relacionados</h5>

                <div class="col-3 mb-3" v-for="item in relatedProducts" :key="item.id">
                    <a :href="`/produto/${item.id}`">
                        <img class="align-self-start w-100"
                            :src="item.img_produto"
                            :alt="item.titulo">
                        <h5 class="font-weight-bold" style="font-size: 1.1em">
                            {{ item.titulo | truncate(50) }}
                        </h5>
                        <h6 class="h5 font-weight-bold text-dark">
                            {{ item.preco | currency('R$ ', 2, { decimalSeparator: ',', thousandsSeparator: '.' }) }}
                        </h6>
                    </a>
                </div>

            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                relatedProducts: {}
            }
        },
        mounted() {
            axios.get('/api/produtos/produtos-relacionados').then((response) => {
                this.relatedProducts = response.data.data
            }).catch((error) => {
                console.log(error.response.data)
            })
        }
    }
</script>