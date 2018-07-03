<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Jugador;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Carta;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $jugador = Jugador::where('id_usuario', 'LIKE', "%$keyword%")
                ->orWhere('dinero', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $jugador = Jugador::paginate($perPage);
        }

        return view('jugador.index', compact('jugador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('jugador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'dinero' => 'required|numeric'
		]);
        $requestData = $request->all();
        
        Jugador::create($requestData);

        return redirect('jugador')->with('flash_message', 'Jugador added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $jugador = Jugador::findOrFail($id);

        return view('jugador.show', compact('jugador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $jugador = Jugador::findOrFail($id);

        return view('jugador.edit', compact('jugador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'dinero' => 'required|numeric'
		]);
        $requestData = $request->all();
        
        $jugador = Jugador::findOrFail($id);
        $jugador->update($requestData);

        return view('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Jugador::destroy($id);

        return redirect('jugador')->with('flash_message', 'Jugador deleted!');
    }

    public function cartas(Jugador $jugador){
        $cartas = $jugador->cartas()->paginate(12);
        return view('user.cartas', compact('cartas'));
    }
    public function comprar($carta)
    {
        $carta =Carta::where('id',$carta)->first();
        $jugador = Jugador::where('id_usuario', Auth::user()->id)->first();
        if($jugador->dinero >= $carta->precio_c()){
            $jugador->dinero = $jugador->dinero - $carta->precio_c();
            if($jugador->cartas()->find($carta->id)){
                $jugador->cartas()->updateExistingPivot($carta->id, ['cantidad'=>  ++$jugador->cartas()->find($carta->id)->pivot->cantidad]);
            }else{
                $jugador->cartas()->attach($carta->id);
            }
            $jugador->save();
            return 'true';
        }
        return 'false';
    }
    public function vender($carta)
    {
        $carta =Carta::where('id',$carta)->first();
        $jugador = Jugador::where('id_usuario', Auth::user()->id)->first();
        $jugador->dinero = $jugador->dinero + $carta->precio_v();
        if($jugador->cartas()->find($carta->id)->pivot->cantidad > 1){
            $jugador->cartas()->updateExistingPivot($carta->id, ['cantidad'=>  --$jugador->cartas()->find($carta->id)->pivot->cantidad]);
        }else{
            $jugador->cartas()->detach($carta->id);
        }
        $jugador->save();
        return 'true';
    }
    public function cargarDinero(Request $request){
        $jugador = Auth::user()->jugador;
        $jugador->dinero += $request->get('dinero');
        $jugador->save();
        return view('user.cartas');
    }
}
