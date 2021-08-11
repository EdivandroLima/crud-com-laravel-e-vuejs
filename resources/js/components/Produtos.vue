<template>
    <div class="row">
        <div class="col-9 mx-auto">

            <div class="text-right mb-3">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                    data-target="#add-produto-modal">
                    <i class="fas fa-plus-circle"></i> Adicionar Produto</button>
            </div>

            <form action="#" method="get" @submit.prevent="search">
                <div class="input-group mb-3">
                    <input class="form-control" type="text" name="s" placeholder="Pesquisar..."
                        aria-label="Recipient's " aria-describedby="my-addon" v-model="searchValue">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-success btn-sm px-3">
                            <i class="fas fa-search"></i>
                            <span class="sr-only">Pesquisar</span>
                        </button>
                    </div>
                </div>
            </form>

            <div class="alert alert-success" role="alert" v-show="message">
                {{message}}
                <button class="close" aria-label="Close" @click="message=null">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card">
                <div class="card-body">

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item" v-for="item in products" :key="`product-${item.id}`">
                            <div class="dropleft pl-2">
                                <a href="#" class="text-dark close ml-2 px-1" style="left: 0" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm text-muted"></i>
                                </a>
                                <div class="dropdown-menu shadow">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit-modal"
                                        @click.prevent="editProduct= item">
                                        <i class="fas fa-sm text-muted fa-edit"></i>
                                        Editar
                                    </a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete-modal"
                                        @click="delProduct= item">
                                        <i class="fas fa-sm text-muted fa-trash-alt"></i>
                                        Remover
                                    </a>
                                </div>
                            </div>
                            <div class="media">
                                <img class="align-self-start mr-3" :src="item.img_produto"
                                    :alt="item.titulo" width="60" height="60">
                                <div class="media-body">
                                    <h4 class="mb-0 h5">
                                        <a :href="`/produto/${item.id}`">
                                            <strong>
                                                {{ item.titulo }}
                                            </strong>
                                        </a>
                                    </h4>
                                    <p class="text-muted ">
                                        {{ item.descricao | truncate(130) }}
                                    </p>
                                    <h5>
                                        <strong>
                                            {{ item.preco | currency('R$ ', 2, { decimalSeparator: ',', thousandsSeparator: '.' })  }}
                                        </strong>
                                    </h5>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        
        <NewProductModal @getProducts="getProducts" />
        <EditProductModal :edit-product="editProduct" @getProducts="getProducts" />
        <DeleteProductModal :del-product="delProduct" @getProducts="getProducts" />
    </div>
</template>

<script>
    import NewProductModal from './modal/NewProductModal'
    import DeleteProductModal from './modal/DeleteProductModal'
    import EditProductModal from './modal/EditProductModal'
    export default {
        components: {
            NewProductModal,
            DeleteProductModal,
            EditProductModal
        },
        data() {
            return {
                delProduct: {},
                editProduct: {},
                products: {},
                searchValue: '',
                message: null,
            }
        },
        methods: {
            search() {
                axios.get('/api/produtos/search?s=' + this.searchValue).then((response) => {
                    this.products = response.data
                }).catch((error) => {
                    console.log(error.response.data)
                })
            },
            getProducts(msg) {
                this.message= msg
                axios.get('/api/produtos').then((response) => {
                    this.products = response.data
                }).catch((error) => {
                    console.log(error.response.data)
                });
            },
        },
        mounted() {
            this.getProducts();
        }
    }

</script>
