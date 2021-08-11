<template>
    <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="#" method="post" @submit.prevent="updateProduct()" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Produto</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="titulo-input2">Titulo *</label>
                            <input id="titulo-input2" :class="['form-control', error.titulo ? 'is-invalid':'']"
                                type="text" name="titulo" :value="editProduct.titulo">
                            <div class="invalid-feedback">
                                {{  error.titulo ? error.titulo[0]:'' }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="preco-input2">Preço *</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input id="preco-input2" :class="['form-control', error.preco ? 'is-invalid':'']"
                                    type="number" name="preco" step="any" max="99999999" :value="editProduct.preco">
                                <div class="invalid-feedback">
                                    {{  error.preco ? error.preco[0]:'' }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descricao-input2">Descrição</label>
                            <textarea rows="3" id="descricao-input2" class="form-control" name="descricao"
                                :value="editProduct.descricao"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
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
        props: {
            editProduct: Object
        },
        methods: {
            updateProduct() {
                let formData = {
                    titulo: document.getElementById('titulo-input2').value,
                    preco: document.getElementById('preco-input2').value,
                    img_produto: this.editProduct.img_produto,
                    descricao: document.getElementById('descricao-input2').value,
                }
                axios.put('/api/produtos/' + this.editProduct.id, formData).then((response) => {
                    // console.log(response.data)
                    this.$emit('getProducts', `O produto foi editado com sucesso`);
                    $('#edit-modal').modal('hide')
                }).catch((error) => {
                    // console.log(error.response.data)
                    this.error = error.response.data.errors
                });
            }
        },
    }

</script>
