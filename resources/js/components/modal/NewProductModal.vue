<template>
    <div id="add-produto-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form action="#" method="post" @submit.prevent="newProduct($event)" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Adicionar Produto</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="titulo-input">Titulo *</label>
                            <input id="titulo-input" :class="['form-control', error.titulo ? 'is-invalid':'']"
                                type="text" name="titulo">
                            <div class="invalid-feedback">
                                {{  error.titulo ? error.titulo[0]:'' }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="preco-addon">Preço *</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input id="preco-addon" :class="['form-control', error.preco ? 'is-invalid':'']"
                                    type="number" name="preco" step="any" max="99999999">
                                <div class="invalid-feedback">
                                    {{  error.preco ? error.preco[0]:'' }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="img-input">Imagem do produto *</label>
                            <input id="img-input" :class="['form-control', error.img_produto ? 'is-invalid':'']" type="file"
                                name="img_produto">
                            <div class="invalid-feedback">
                                {{  error.img_produto ? error.img_produto[0]:'' }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descricao-input">Descrição</label>
                            <textarea rows="3" id="descricao-input" class="form-control" name="descricao"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                error: {}
            }
        },
        methods: {
            newProduct(e) {
                // axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
                let formData = new FormData(e.target);
                axios.post('/api/produtos', formData).then((response) => {
                    // console.log(response.data)
                    this.$emit('getProducts', 'Produto adicionado com sucesso');
                    e.target.reset()
                    $('#add-produto-modal').modal('hide')
                }).catch((error) => {
                    // console.log(error.response.data)
                    this.error = error.response.data.errors
                });
            },
        },
    }

</script>
