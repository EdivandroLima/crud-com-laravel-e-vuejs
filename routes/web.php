<?php

use Illuminate\Support\Facades\Route;

Route::get('/produto/{id}',function($id) {
    return view('produto', compact('id'));
});

Route::get('/', function () {
    return view('index');
});
