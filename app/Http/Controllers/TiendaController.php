<?php

namespace App\Http\Controllers;

use App\Carta;
use App\Jugador;
use App\Sobre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TiendaController extends Controller
{
    public function cartas()
    {
        $cartas = Carta::paginate(12);
        return view('tienda.cartas',compact('cartas'));
    }
    public function sobres()
    {
        $sobres = Sobre::paginate(12);
        return view('tienda.sobres',compact('sobres'));
    }

    public function comprar_sobre(Sobre $sobre,Request $request){
        $cartas = $sobre->cartas();
        $jugador = Jugador::find(Auth::user()->id);
        if($jugador->dinero >= $sobre->precio) {
            $jugador->dinero -= $sobre->precio;
            foreach ($cartas as $carta) {
                if ($jugador->cartas()->find($carta->id)) {
                    $jugador->cartas()->updateExistingPivot($carta->id, ['cantidad' => ++$jugador->cartas()->find($carta->id)->pivot->cantidad]);
                } else {
                    $jugador->cartas()->attach($carta->id);
                }
            }
            $jugador->save();
            $cartas = $sobre->cartas();
            return view('user.sobres',compact('cartas'));

        }else{
            return 'fail';
        }
    }
}
