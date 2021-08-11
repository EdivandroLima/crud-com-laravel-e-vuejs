<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Produto::orderBy('created_at', 'desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoRequest $request)
    {
        $produto = (new Produto)->fill($request->all());
        $path = $request->file('img_produto')->store('img_produtos', 'public');
        $produto->img_produto = '/storage/' . $path;
        $produto->save();
        return response($produto->toJson());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return response()->json($produto);
    }

    public function search(Request $request)
    {
        $produtos = Produto::where("titulo", "like", "%$request->s%")->get();
        return response()->json($produtos);
    }

    public function produtosRelacionados()
    {
        $produtos = Produto::orderBy('created_at', 'desc')->paginate(8);
        return response()->json($produtos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoRequest $request, Produto $produto)
    {
        $produto->fill($request->all());
        $produto->update();
        return response()->json($produto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
    }
}
