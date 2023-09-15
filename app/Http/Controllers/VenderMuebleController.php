<?php

namespace App\Http\Controllers;

use App\Models\Mueble;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VenderMuebleController extends Controller
{
    public function __invoke(int $id)
    {
        $mueble = Mueble::find($id);
        $mueble->terminado = $mueble->terminado == null ? Carbon::now("America/Tijuana") : null;
        $mueble->disponible = $mueble->disponible == 0 ? 1 : 0;
        $mueble->save();
        return $mueble;
    }
}
