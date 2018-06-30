<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Clase_cartum;
use Illuminate\Http\Request;

class Clase_cartaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $clase_carta = Clase_cartum::where('precio_c', 'LIKE', "%$keyword%")
                ->orWhere('precio_v', 'LIKE', "%$keyword%")
                ->orWhere('probabilidad', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('imgUrl', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $clase_carta = Clase_cartum::paginate();
        }

        return view('clase_carta.clase_carta.index', compact('clase_carta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('clase_carta.clase_carta.create');
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
			'nombre' => 'required|max:20',
			'precio_c' => 'required',
			'precio_v' => 'required',
			'probabilidad' => 'required|numeric'
		]);
        $requestData = $request->all();
        
        Clase_cartum::create($requestData);

        return redirect('clase_carta/')->with('flash_message', 'Clase_cartum added!');
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
        $clase_cartum = Clase_cartum::findOrFail($id);

        return view('clase_carta.clase_carta.show', compact('clase_cartum'));
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
        $clase_cartum = Clase_cartum::findOrFail($id);

        return view('clase_carta.clase_carta.edit', compact('clase_cartum'));
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
			'nombre' => 'required|max:20',
			'precio_c' => 'required',
			'precio_v' => 'required',
			'probabilidad' => 'required|numeric'
		]);
        $requestData = $request->all();
        
        $clase_cartum = Clase_cartum::findOrFail($id);
        $clase_cartum->update($requestData);

        return redirect('clase_carta/')->with('flash_message', 'Clase_cartum updated!');
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
        Clase_cartum::destroy($id);

        return redirect('clase_carta/')->with('flash_message', 'Clase_cartum deleted!');
    }
}
