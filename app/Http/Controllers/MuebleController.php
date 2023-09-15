<?php

namespace App\Http\Controllers;

use App\Models\Mueble;
use Illuminate\Http\Request;

class MuebleController extends Controller
{
    public function index()
    {
        return response()->json(Mueble::with("Categorias")->get());
    }

    public function store(Request $request)
    {
        $mueble = Mueble::create($request->post());
        return response()->json($mueble);
    }

    public function show(Mueble $mueble)
    {
        return response()->json($mueble);
    }

    public function update(Mueble $mueble,Request $request)
    {
        $mueble->fill($request->post())->save();
        return response()->json($mueble);
    }

    public function destroy(Mueble $mueble)
    {
        $mueble->delete();
        return "ok";
    }
}
