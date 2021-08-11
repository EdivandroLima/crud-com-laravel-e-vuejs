@extends('layouts.app')
@section('title', 'Produtos')
@section('content')
<div class="container py-4">
    <produtos></produtos>
    <div>
        {{-- <form action="/api/produtos/1" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Produto</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="titulo-input">Titulo *</label>
                            <input id="titulo-input" class="form-control" type="text" name="titulo"
                                 required>
                        </div>
                        <div class="form-group">
                            <label for="preco-addon">Preço *</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input id="preco-addon" class="form-control" type="number" name="preco" step="any"
                                    max="999999"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descricao-input">Descrição</label>
                            <textarea rows="3" id="descricao-input" class="form-control" name="descricao"></textarea>
                        </div>
                        @method('PUT')

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form> --}}
    </div>
</div>
@endsection
