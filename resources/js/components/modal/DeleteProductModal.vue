<template>
    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-sm" role="document" style="max-width: 280px;">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-3 text-muted">
                        <i class="fas fa-info-circle fa-4x"></i>
                    </div>
                    Tem certeza que deseja excluir <strong>{{ this.delProduct.titulo }}</strong> permanentemente?
                </div>
                <div class="modal-footer">

                    <form method="POST" action="" id="deletar-conta-form" @submit.prevent="del">
                        <button class="btn btn-sm px-4 btn-danger" type="submit" aria-label="Deletar"><i
                                class="fas fa-check"></i></button>
                    </form>

                    <button class="btn btn-sm px-4 btn-secondary" type="button" data-dismiss="modal"
                        aria-label="Cancelar"><i class="fas fa-times"></i></button>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            delProduct: Object
        },
        methods: {
            del() {
                axios.delete('/api/produtos/' + this.delProduct.id).then((response) => {
                    console.log(response)
                    this.$emit('getProducts');
                    $('#delete-modal').modal('hide')
                }).catch((error) => {
                    console.log(error.response.data)
                });
            },
        },
    }

</script>
