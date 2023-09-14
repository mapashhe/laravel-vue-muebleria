<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        return response()->json(Categoria::all());
    }

    public function store(Request $request)
    {
        $categoria = Categoria::create($request->post());
        return response()->json($categoria);
    }

    public function show(int $categoria)
    {
        return response()->json(Categoria::find($categoria));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $categoria->fill($request->post())->save();
        return response()->json($categoria);
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return response()->json("done");
    }
}
