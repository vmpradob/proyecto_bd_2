<?php

namespace App\Http\Controllers;

use App\Carta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TiendaController extends Controller
{
    public function cartas()
    {
        $cartas = Carta::paginate(12);
        return view('tienda.cartas',compact('cartas'));
    }
}
