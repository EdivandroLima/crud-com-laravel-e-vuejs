@extends('layouts.app')
@section('title', 'Produtos')
@section('content')
<div class="container py-4">
    <produto-show id-product="{{ $id }}"></produto-show>
</div>
@endsection
